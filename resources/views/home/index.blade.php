@extends('layotus.app-master')

@section('content')

    <div class="container mt-4 container-transparent">

        <!-- Jumbotron -->
        <div class="p-5 text-center container-transparent">
            <h1 class="mb-3">Edomus</h1>
            <h4 class="mb-3">Gestion de domótica local y personalizada</h4>
            @auth
            <h6>Bienvenido <strong>{{auth()->user()->username}}</strong></h6>
            <a class="btn btn-primary mt-4" href="/dashboard" role="button">Al dashboard</a>
            @endauth
            @guest
            <h6>Inicia sesión para acceder a las funciones adicionales</h6>
            <a class="btn btn-success mt-4" href="/login" role="button">Registrate</a>
            @endguest
        </div>
        <!-- Jumbotron -->


        <!-- Promo Carousel -->
        @include('layotus.partials.home.promocarousel')

        
    </div>

@endsection