@extends('layotus.app-master')

@section('content')

    <style>
        #add-room-form{
            display : none;
        }
        #add-room-form.active {
            display : block;
        }
    </style>

    <div class="container w-25 border p-4 mt-4 mb-4">
        <div class="row justify-content-center align-items-center g-2">
            <form action="{{ route('buildings.update',['building' => $building->id]) }}"  method="POST">
                @method('PATCH')
                @csrf
                @include('layotus.partials.messages')
                <div class="mb-3 row">
                    <label for="title" class="col-4 col-form-label">Nombre</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{$building->name}}">
                </div>
                <div class="mb-3 row">
                    <spam >Pisos: {{$building->getNumFloors()}}</span>
                </div>
                
                <div class="mb-3 row">
                    <div class="col d-flex justify-content-end">
                        <button type="submit" class="btn btn-success">Actualizar</button>
                    </div>

                    <div class="col d-flex justify-content-end">
                        <button type="button" id="add-room" class="btn btn-success">Añadir sala</button>
                    </div>
                    <script>
                        document.getElementById('add-room').addEventListener('click', function(){
                            document.getElementById('add-room-form').classList.toggle("active");
                        });
                    </script>
                </div>
            </form>
                
        </div>

        <div id="add-room-form" class="row justify-content-center align-items-center g-2">
            <form action="/addRoom/{{$building->id}}"  method="POST">
                @method('POST')
                @csrf
                <input type="hidden" name="building" id="building" value={{$building->id}}>
                <div class="mb-3 row">
                    <label for="title" class="col-4 col-form-label">Estancia</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                </div>
                <div class="mb-3 row">
                    <label for="title" class="col-4 col-form-label">Clasificación</label>
                    <select  class="form-control" name="type" id="type">
                        @foreach($roomTypes as $type)
                            <option value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 row">
                    <label for="title" class="col-4 col-form-label">Alto</label>
                    <input type="text" class="form-control" name="height" id="height" placeholder="height">
                </div>
                <div class="mb-3 row">
                    <label for="title" class="col-4 col-form-label">Largo</label>
                    <input type="text" class="form-control" name="width" id="width" placeholder="width">
                </div>
                <div class="mb-3 row">
                    <label for="title" class="col-4 col-form-label">Ancho</label>
                    <input type="text" class="form-control" name="length" id="length" placeholder="length">
                </div>
                <div class="mb-3 row">
                    <label for="title" class="col-4 col-form-label">Volumen</label>
                    <div class="input-group p-0">
                        <input type="text" class="form-control" name="volume" id="volume" placeholder="volume">
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
                    <label for="title" class="col-4 col-form-label">Piso</label>
                    <input type="text" class="form-control" name="floor" id="floor" placeholder="floor">
                </div>
                
                <div class="mb-3 mt-4 row justify-content-center">
                    <div class="col d-flex justify-content-center">
                        <button type="button" class="btn btn-danger" id="btn-close-form">Cancelar</button>
                        <script>
                            document.getElementById('btn-close-form').addEventListener('click', function(){
                                document.getElementById('add-room-form').classList.toggle("active");
                            });
                        </script>
                    </div>
                    <div class="col d-flex justify-content-center">
                        <button type="submit" class="btn btn-success">Añadir</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- ROOMS CONTIANER -->


    @if ($building->Rooms->count() > 0)
        @foreach ($building->getFloors() as $nameFloor =>$floor)
            <div class="container overflow-hidden border mb-3 p-4">
                <h3>Piso {{$nameFloor}}</h3>
                <div class="row gy-5">
                    @foreach ($floor as $room)
                        <div class="col-6">
                            
                            <div class="container p-3 border bg-transparent room-container" style="background-image: url('{{url('assets/images/svg/rooms/'.$room->getType().'.svg')}}')">
                                <div class="row">
                                    <div class="col">
                                        <a href="#" class="">{{$room->name}}</a>
                                    </div>
                                    <div class="col">
                                        {{$room->getType()}}
                                    </div>
                                    <div class="col">
                                        <form action="" method="POST">
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
        <div class="container border mb-3 p-4">
            <p>Este edificio no tiene instancias</p>
        </div>
    @endif



@endsection