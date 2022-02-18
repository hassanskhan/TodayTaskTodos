@extends('Todos.layout')
@section('content')
    
    <div class="container mt-4">
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
        <form action="{{url('/todos/create')}}" method="post">

            @csrf

            <div class="mb-3">
                <label for="" class="form-label">ToDoList</label>
                <textarea class="form-control" name="title" id="" rows="3"></textarea>

            </div>
            <div class="mb-3">
                <button type="submit" name="submit" class="btn btn-success">Create</button>
            </div>

        </form>

    </div>

@endsection


