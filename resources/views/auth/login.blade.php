@extends('layotus.app-master')

@section('content')

<div class="container w-25 border p-4 mt-4">
    <div class="row justify-content-center align-items-center g-2">

        @error('title')
            <h6 class="alert alert-danger">{{ $message }}</h6>  
        @enderror

        <form action="/login" method="POST">
            @method('POST')
            @csrf
            @include('layotus.partials.messages')
            <div class="mb-3 row">
                <label for="title" class="col-4 col-form-label">User/Email</label>
                <input type="text" class="form-control border-success" name="username" id="username" placeholder="username">
            </div>

            <div class="mb-3 row">
                <label for="title" class="col-4 col-form-label">Password</label>
                <input type="password" class="form-control border-success" name="password" id="password" placeholder="password">
            </div>

            <div class="mb-3 row">
                <div class="col d-flex justify-content-end">
                    <a href="/register">Sign Up</a>
                </div>
            </div>
            
            <div class="mb-3 row">
                <div class="col d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">Sign In</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection