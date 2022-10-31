@extends('layotus.app-master')

@section('content')

    <div class="container mt-4 container-transparent">
        @auth
        <!-- <h6>Bienvenido <strong>{{auth()->user()->username}}</strong></h6> -->
        @endauth
    
        @guest
            <h6><a href="/login">Inicia sesión</a> para acceder a las funciones adicionales</h6>
        @endguest
    </div>

@endsection