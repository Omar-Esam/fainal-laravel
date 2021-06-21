@extends('layouts.app')

@section('content')

    <div class="container col-5">
        <div class="card " style="width: 400px" >
            <img src="{{asset('img/Untitled7.jpg')}}" class="card-img-top "   alt="...">
            <h2 style="margin: 10px">File Title : <br>{{ $file->title }}</h2>
            <div class="card-body">
                <p>File Description : <br> {{ $file->desc }} </p>
                <h4>File Name : <br>{{ $file->file }}</h4>
            </div>
            <a href="{{route('file.download', $file->id)}}" type="submit" class="btn btn-info "> Download </a>
            <a href="{{route('file.share', $file->id)}}" type="submit" class="btn btn-primary "> Share </a>


        </div>
    </div>

@endsection
