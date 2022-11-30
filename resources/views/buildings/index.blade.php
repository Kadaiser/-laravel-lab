@extends('layotus.app-master')

@section('content')

<div class="container w-25 p-4 mt-4 bg-dark border border-success rounded">

    <div class="row justify-content-center align-items-center g-2">
        <form action="{{ route('buildings.store') }}"  method="POST">
            @csrf
            @include('layotus.partials.messages')
            <div class="mb-3 row">
                <label for="title" class="col-4 col-form-label text-success">Nombre</label>
                <input type="text" class="form-control border-success" name="name" id="name" placeholder="Name">
            </div>
            <div class="mb-3 row">
                <label for="title" class="col-4 col-form-label text-success">Ubicación</label>
                <input type="text" class="form-control border-success" name="location" id="location" placeholder="Name">
            </div>
            <div class="mb-3 row">
                <label for="title" class="col-4 col-form-label text-success">Clasificación</label>
                <select  class="form-control border-success" name="type" id="type">
                    @foreach($types as $type)
                        <option value="{{$type->id}}">{{$type->name}}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-3 row">
                <div class="col d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">Crear</button>
                </div>
            </div>
        </form>
    </div>

    @foreach($buildings as $building)

    <div class="row justify-content-center align-items-center g-2">
        <div class="col-md-9 d-flex align-items-center">
            <span class='color-container p-2'> </span> &nbsp
            <a class="d-flex align-items-center gap-2 text-info" href="{{ route('buildings.show', $building) }}">
                {{$building->name}}
            </a>
        </div>
        <div class="col-md-3 d-flex align-items-center text-success">
            {{$building->getType()}}
        </div>
    </div>

    @endforeach

</div>

@endsection