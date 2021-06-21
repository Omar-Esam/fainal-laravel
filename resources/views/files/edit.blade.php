@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif




    <div class="container col-7">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('file.update',$file->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" value="{{ $file->title }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="desc"  id="" cols="30"
                            rows="10">{{ $file->desc }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>File</label>
                        <input type="file" name="fileInput" class="form-control">
                        <p>{{ $file->file }}"</p>
                        <div class="form-group " class="form-control" style="opacity: 0" >
                            <label>User ID</label>
                            <input type="number" name=userId value="{{Auth::user()->id}}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info btn-block"> update </button>

                </form>
            </div>
        </div>
    </div>
@endsection
