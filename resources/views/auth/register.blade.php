@extends('layotus.app-master')
@section('content')

<div class="container  bg-dark w-25 border border-success p-4 mt-4">
    <div class="row justify-content-center align-items-center g-2">

        
        <form action="/register" method="POST">
            @csrf
            @include('layotus.partials.messages')
            <div class="mb-3 row">
                <label for="title" class="col-4 col-form-label text-success">Email</label>
                <input type="text" class="form-control border-success" name="email" id="email" placeholder="email">
                <small id="emailHelp" class="form-text text-success">We'll never share your email with anyone.</small>
            </div>

            <div class="mb-3 row">
                <label for="title" class="col-4 col-form-label text-success">Username</label>
                <input type="text" class="form-control border-success" name="username" id="username" placeholder="username">
            </div>

            <div class="mb-3 row">
                <label for="title" class="col-4 col-form-label text-success">Password</label>
                <input type="password" class="form-control border-success" name="password" id="password" placeholder="password">
            </div>

            <div class="mb-3 row">
                <label for="title" class="col-7 col-form-label text-success">Confirm password</label>
                <input type="password" class="form-control border-success" name="password_confirmation" id="password_confirmation" placeholder="password">
            </div>

            <div class="mb-3 row">
                <div class="col d-flex justify-content-end">
                    <a href="/login">Have an account?</a>
                </div>
            </div>
            
            <div class="mb-3 row">
                <div class="col d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">Sign up</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection