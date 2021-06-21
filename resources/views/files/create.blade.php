@extends('layouts.app')

@section('content')
    @if (Session::has('done'))
        <div class="alert alert-info mx-auto col-6" >
            <h3 class="text-center"> {{ Session::get('done') }}</h3>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger mx-auto col-6">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif




    <div class="container col-7">
        <div class="card">
            <h1 class="text-center text-primary display-4"> Welcome At Add File Page </h1>

            <div class="card-body">
                <form action="{{ route('file.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="desc" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label>File</label>
                        <input type="file" name="fileInput" class="form-control">
                    </div>
                    <div class="form-group " class="form-control" style="opacity: 0" >
                        <label>User ID</label>
                        <input type="number" name=userId value="{{Auth::user()->id}}">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block"> Send </button>

                </form>
            </div>
        </div>
    </div>
@endsection
