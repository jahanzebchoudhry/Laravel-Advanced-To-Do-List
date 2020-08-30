@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All-To-Dos</div>

                <div class="card-body">

                    <h1>Edit</h1>


                    <form action="/todos/{{$todo->id}}/update" method="post">

                    @method('PUT')

                        @csrf
                        <input type="text" name="title" id="title" value="{{ $todo->title }}"><br>
                        @error('title')
                        <small class="text-danger">{{ $message}}</small><br>
                        @enderror
                        <input class="mt-2 btn btn-dark" type="submit" value="Edit">
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection