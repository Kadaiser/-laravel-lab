@extends('layotus.app-master')

@section('content')
    <style>
    </style>

    <div class="container bg-dark border p-4 mt-4 mb-4">
        <div class="row justify-content-center align-items-center g-4 mb-4">
            <div class="text-success col">{{$room->name}}</div>
        </div>
        <div class="row justify-content-center align-items-center g-4 mb-4">
            <div class="text-success col">Tipo: {{$room->getType()}}</div>
        </div>
        <div class="row justify-content-center align-items-center g-4 mb-4">
            <div class="text-success col">Piso: {{$room->floor}}</div>
        </div>

        <div class="row justify-content-center align-items-center g-4 mb-4">
            <div class="text-success col">Alto: {{$room->height}}</div>
            <div class="text-success col">Ancho: {{$room->width}}</div>
            <div class="text-success col">Profundo: {{$room->width}}</div>
            <div class="text-success col">Volumen: {{$room->volume}} &#13221;</div>
        </div>


        <div class="row justify-content-center align-items-center g-2 mb-4">
            <div class="text-success col-2">
                <a name="" id="" class="btn btn-primary" href="{{ route('buildings.show', $room->building_id) }}"  role="button">Volver</a>
            </div>
            <div class="col">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addSensor">
                    Sala
                </button>
            </div>
        </div>
    </div>


        <!-- Modal -->
        <div class="modal fade" id="addSensor" tabindex="-1" aria-labelledby="addSensorLabel" aria-hidden="true">
    <form action="{{ route('buildings.addSensor', $room) }}"  method="POST">
        @method('POST')
        @csrf
        <div class="modal-dialog">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h5 class="modal-title text-success" id="addSensorLabel">Añadir Sensor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>


            <div class="modal-body">
                        
                <div id="add-room-form" class="row justify-content-center align-items-center g-2">
                        <input type="hidden" name="room" id="room" value={{$room->id}}>
                        <div class="mb-3 row">
                            <label for="title" class="col-4 col-form-label text-success">Nombre</label>
                            <input type="text" class="form-control border-success" name="name" id="name" placeholder="Name">
                        </div>
                        <div class="mb-3 row">
                            <label for="title" class="col-4 col-form-label text-success">Modelo</label>
                            <input type="text" class="form-control border-success" name="model" id="floor" placeholder="model">
                        </div>
                        <div class="mb-3 row">
                            <label for="title" class="col-4 col-form-label text-success">Host IP</label>
                            <input type="text" class="form-control border-success" name="ws_host" id="ws_host" placeholder="0.0.0.0:8000">
                        </div>
                        
                    </div>   
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Añadir</button>
            </div>
        </div>
    </div>
    </form>
    </div>



        <!-- SENSORS CONTIANER -->
        @if ($room->Sensors->count() > 0)
        @foreach ($room->Sensors as $sensor)
            <div class="container bg-dark border mb-3 p-4">
                <div class="row gy-5">
                        <div class="col-6">
                            
                            <div class="container p-3 border bg-transparent room-container">
                                <div class="row">
                                    <div class="col">
                                        <a href="{{ route('rooms.show', $room) }}" class="text-success">{{$sensor->name}}</a>
                                    </div>
                                    <div class="col text-success">
                                        {{$sensor->getType()}}
                                    </div>
                                </div>
                            </div>

                        </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="container border mb-3 p-4 bg-dark">
            <p class="text-success" >Este edificio no tiene sensores</p>
        </div>
    @endif

@endsection