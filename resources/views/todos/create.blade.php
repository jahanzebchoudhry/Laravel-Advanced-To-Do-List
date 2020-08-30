@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All-To-Dos</div>

                <div class="card-body">

                    <h1>What Next you want to do?</h1>


                    <form action="/todos/create" method="post">

                        @csrf
                        <input type="text" name="title" id="title" value="{{ old('title') }}"><br>
                        @error('title')
                        <small class="text-danger">{{ $message}}</small><br>
                        @enderror
                        <input class="mt-2" type="submit" value="Submit">
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection