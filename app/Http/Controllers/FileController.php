<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;




class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user()->id;
        $file = File::where("userId", "=", $user)->get();
        return view('files.index')->with('files', $file);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('files.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5',
            'desc' => 'required|min:5|max:200',
            'fileInput' => 'required'

        ]);
        $file = new File();
        $file->title = $request->title;
        $file->desc = $request->desc;

        $file_data = $request->file('fileInput');
        $file_name = $file_data->getClientOriginalName();
        $file_data->move(public_path() . '/realfiles/', $file_name);
        $file->file = $file_name;
        $file->userId = $request->userId;

        $file->save();
        return redirect()->back()->with("done", "insert done");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $file = File::find($id);
        return view('files.show')->with("file", $file);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $file = File::find($id);
        return view('files.edit')->with("file", $file);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $file = File::find($id);
        $file->title = $request->title;
        $file->desc = $request->desc;

        $file_data = $request->file('fileInput');
        $file_name = $file_data->getClientOriginalName();
        $file_data->move(public_path() . '/realfiles/', $file_name);
        $file->file = $file_name;
        $file->userId = $request->userId;

        $file->save();
        return redirect('files')->with("done", "updated done");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = File::find($id);
        $file->delete();
        return redirect()->back()->with("done", "Delete done");
    }
    public function download($id)
    {
        $data = File::where('id', $id)->firstorfail();
        $pathfile = public_path('realfiles/' . $data->file);
        return response()->download($pathfile);
    }
    public function public()
    {
        $file = File::where("userId", "=", 0)->get();
        return view('files.publicFilse')->with('files', $file);
    }
    public function share($id){
        $file = File::find($id);
        $file->userId =0;
        $file->save();
        return redirect('files/publicFilse');


    }

}
