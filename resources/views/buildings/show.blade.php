@extends('layotus.app-master')

@section('content')

    <div class="container bg-dark w-25 p-4 my-4 border border-success rounded">
        <div class="row justify-content-center align-items-center g-2">
            <form action="{{ route('buildings.update', $building) }}"  method="POST">
                @method('PATCH')
                @csrf
                @include('layotus.partials.messages')
                <div class="mb-3 row">
                    <label for="title" class="col-4 col-form-label text-success">Nombre</label>
                    <input type="text" class="form-control border-success" name="name" id="name" placeholder="Name" value="{{$building->name}}">
                </div>
                <div class="mb-3 row">
                    <spam class="text-success">Pisos: {{$building->getNumFloors()}}</span>
                </div>
                
                <div class="mb-3 row justify-content-center align-items-center g-4">
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>

                    <div class="col">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addRoomModal">
                            Sala
                        </button>
                    </div>
                    <div class="col">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteBuildingModal">
                            Demoler
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addRoomModal" tabindex="-1" aria-labelledby="addRoomModalLabel" aria-hidden="true">
    <form action="{{ route('rooms.store', $building) }}"  method="POST">
        @method('POST')
        @csrf
        <div class="modal-dialog">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h5 class="modal-title text-success" id="addRoomModalLabel">Añadir Sala</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>


            <div class="modal-body">
                        
                <div id="add-room-form" class="row justify-content-center align-items-center g-2">
                        <input type="hidden" name="building" id="building" value={{$building->id}}>
                        <div class="mb-3 row">
                            <label for="title" class="col-4 col-form-label text-success">Estancia</label>
                            <input type="text" class="form-control border-success" name="name" id="name" placeholder="Name">
                        </div>
                        <div class="mb-3 row">
                            <label for="title" class="col-4 col-form-label text-success">Clasificación</label>
                            <select  class="form-control border-success" name="type" id="type">
                                @foreach($roomTypes as $type)
                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 row">
                            <label for="title" class="col-4 col-form-label text-success">Alto</label>
                            <input type="text" class="form-control border-success" name="height" id="height" placeholder="height">
                        </div>
                        <div class="mb-3 row">
                            <label for="title" class="col-4 col-form-label text-success">Largo</label>
                            <input type="text" class="form-control border-success" name="width" id="width" placeholder="width">
                        </div>
                        <div class="mb-3 row">
                            <label for="title" class="col-4 col-form-label text-success">Ancho</label>
                            <input type="text" class="form-control border-success" name="length" id="length" placeholder="length">
                        </div>
                        <div class="mb-3 row">
                            <label for="title" class="col-4 col-form-label text-success">Volumen</label>
                            <div class="input-group p-0">
                                <input type="text" class="form-control border-success" name="volume" id="volume" placeholder="volume">
                                <button class="btn btn-outline-success" type="button" id="button-addon2">Calcular</button>
                                <script>
                                    document.getElementById("button-addon2").addEventListener("click", function(){
                                        var height = document.getElementById("height").value;
                                        var width = document.getElementById("width").value;
                                        var length = document.getElementById("length").value;
                                        var volume = height * width * length;
                                        document.getElementById("volume").value = volume;
                                    });
                                </script>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="title" class="col-4 col-form-label text-success">Piso</label>
                            <input type="text" class="form-control border-success" name="floor" id="floor" placeholder="floor">
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


        <!-- Modal  DELETE-->
        <div class="modal fade" id="deleteBuildingModal" tabindex="-1" aria-labelledby="deleteBuildingModalLabel" aria-hidden="true">
    <form action="{{route('buildings.destroy', $building)}}"  method="POST">
        @method('DELETE')
        @csrf
        <div class="modal-dialog">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h5 class="modal-title text-success" id="deleteBuildingModalLabel">Añadir Sala</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>


            <div class="modal-body">
                <p class="text-success">Al eliminar un edificio todas las estancian incluidas y los enlaces con elementos IoT en sus interiores seran desvinculados. Esta acción es irreversible</p> 
                <p class="text-success">¿Confirmas la eliminación de este edificio?</p>        
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger">Confirmar</button>
            </div>
        </div>
    </div>
    </form>
    </div>

    <!-- ROOMS CONTIANER -->
    @if ($building->Rooms->count() > 0)
        @foreach ($building->getFloors() as $nameFloor =>$floor)
            <div class="container bg-dark border mb-3 p-4">
                <h3 class="text-success">Piso {{$nameFloor}}</h3>
                <div class="row gy-5">
                    @foreach ($floor as $room)
                        <div class="col-6">
                            
                            <div class="container p-3 border bg-transparent room-container" style="background-image: url('{{url('assets/images/svg/rooms/'.$room->getType().'.svg')}}')">
                                <div class="row">
                                    <div class="col">
                                        <a href="{{route('rooms.show', ['building' => $building, 'room' => $room])}}" class="text-success">{{$room->name}}</a>
                                    </div>
                                    <div class="col text-success">
                                        {{$room->getType()}}
                                    </div>
                                    <div class="col text-success">
                                        <form action="{{route('rooms.destroy',['building' => $building, 'room' =>  $room])}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button name="" id="" class="btn btn-danger btn-sm">Borrar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    @else
        <div class="container border mb-3 p-4 bg-dark">
            <p class="text-success" >Este edificio no tiene instancias</p>
        </div>
    @endif



@endsection