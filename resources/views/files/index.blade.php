@extends('layouts.app')

@section('content')
    @if (Session::has('done'))
        <div class="alert alert-info col-12 mx-auto" >
            <h3 class="text-center"> {{ Session::get('done') }}</h3>
        </div>
    @endif
    <div class="container col-7">
        <div class="card">
            <h1 class="text-center text-primary display-4"> Welcome At Your Files Page </h1>

            <div class="card-body">
                <table class="table table-dark table-hover text-center">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th colspan="3">Action</th>
                    </tr>
                    @foreach ($files as $data)

                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->title }}</td>
                            <td><a href="{{ route('file.show', $data->id) }}" class="btn btn-info">View</a></td>
                            <td><a href="{{ route('file.edit', $data->id) }}" class="btn btn-primary">Edit</a></td>
                            <td><a href="{{ route('file.destroy', $data->id) }}" class="btn btn-danger">Delete</a></td>



                        </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </div>
@endsection
