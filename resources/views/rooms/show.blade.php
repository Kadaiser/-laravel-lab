@extends('layotus.app-master')

@section('content')
    <style>
    </style>

    <div class="container border p-4 mt-4 mb-4">
        <div class="row justify-content-center align-items-center g-4 mb-4">
            <div class="col">{{$room->name}}</div>
        </div>
        <div class="row justify-content-center align-items-center g-4 mb-4">
            <div class="col">Tipo: {{$room->getType()}}</div>
        </div>
        <div class="row justify-content-center align-items-center g-4 mb-4">
            <div class="col">Piso: {{$room->floor}}</div>
        </div>

        <div class="row justify-content-center align-items-center g-4 mb-4">
            <div class="col">Alto: {{$room->height}}</div>
            <div class="col">Ancho: {{$room->width}}</div>
            <div class="col">Profundo: {{$room->width}}</div>
            <div class="col">Volumen: {{$room->volume}} &#13221;</div>
        </div>

        <div class="row justify-content-center align-items-center g-2 mb-4">
            <div class="col-2">
                <a name="" id="" class="btn btn-primary" href="/buildings/{{$room->building_id}}"  role="button">Volver</a>
            </div>
        </div>
    </div>
@endsection