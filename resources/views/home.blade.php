@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    <h1>Upload Image</h1>

                   <x-alert/>

                    <form action="/upload" method="post" enctype="multipart/form-data">

                        @csrf
                        <input type="file" name="image" id="image">
                        <input type="submit" value="Submit">
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection