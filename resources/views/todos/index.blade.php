@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All To-Do's</div>

                <div class="card-body">

                    <h1 class="d-flex justify-content-center">All To-Do's <a class="ml-5" href="/todos/create"><button
                                class="btn btn-primary">Create a
                                To-Do</button></a>
                    </h1>
                    <hr>

                    @foreach($todos as $todo)
                    <div class="container">
                        <div class="row">
                            @if($todo->completed)

                            <div class="col-10">
                                <h3><del>{{$todo->title}}</del></h3>
                            </div>

                            @else
                            <div class="col-10">
                                <h3>{{$todo->title}}</h3>
                            </div>
                            @endif

                            <div class="col-2 d-flex justify-content-end">
                                <a href="/todos/{{$todo->id}}/edit"> <i class="fa fa-edit mr-3"
                                        style="font-size:24px; color: #000"></i>
                                </a>
                                <span onclick="event.preventDefault();document.getElementById('delete-{{$todo->id}}').submit()" style="cursor: pointer;"><i class="fa fa-trash mr-3" style="font-size:24px; color:red"></i></span>

                                <form action="{{route('todo.delete' , $todo->id)}}" id="{{'delete-' .$todo->id}}" method="POST">
                                @csrf

                                @method('DELETE')

                                </form>
                                @if($todo->completed)
                                <span
                                    onclick="event.preventDefault();document.getElementById('form-incompleted-{{$todo->id}}').submit()"
                                    style="cursor:pointer;">
                                    <i class="fa fa-check" style="font-size:24px; color:green"></i>
                                </span>

                                <form action="{{route('todo.incomplete' , $todo->id)}}" method="POST"
                                    id="{{'form-incompleted-' .$todo->id}}">
                                    @csrf
                                    @method('PUT')

                                </form>
                                @else
                                <span
                                    onclick="event.preventDefault();document.getElementById('form-completed-{{$todo->id}}').submit()"
                                    style="cursor:pointer;">
                                    <i class="fa fa-check" style="font-size:24px; color:grey"></i>
                                </span>
                                @endif

                                <form action="{{route('todo.complete' , $todo->id)}}" method="POST"
                                    id="{{'form-completed-' .$todo->id}}">
                                    @csrf
                                    @method('PUT')

                                </form>

                            </div>

                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection