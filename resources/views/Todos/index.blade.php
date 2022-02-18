@extends('Todos.layout') @section('content')


<div class="container">
    @if (session()->has('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong>{{session()->get('status')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <h1>TodosList</h1>
    <a href="{{url('/todos/create')}}"><button type="submit" class="btn btn-info my-3"><i class="fa fa-plus" aria-hidden="true"></i></button></a>
    <table class="table" id="myTable">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Title</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        @foreach ($Todos as $todos)


        <tbody>
            <tr>
                <th scope="row">{{$todos->id}}</th>
                @if ($todos->completed)

                <td class="text-decoration-line-through">{{$todos->title}}</td>
                @else

                <td>{{$todos->title}}</td>
                @endif
                <td class="d-flex d-inline ml-3">

                    <a href="{{url('/todos/'.$todos->id)}}"><button class="btn btn-primary"><i class="fa fa-pencil-square" aria-hidden="true"></i></button></a> ||
                    <a href="{{url('/delete/'.$todos->id)}}"><button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button></a>
                     @if ($todos->completed)

                    <button class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></button>
                     @else

                    <span class="btn btn-secondary" onclick="event.preventDefault();document.getElementById('form-complete-{{$todos->id}}').submit()"><i class="fa fa-check" aria-hidden="true"></i></span>

                    <form class="d-none" id="{{'form-complete-'.$todos->id}}" action="{{route('todos.complete',$todos->id)}}}" method="post">
                        @csrf @method('put')


                    </form>

                    @endif

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection