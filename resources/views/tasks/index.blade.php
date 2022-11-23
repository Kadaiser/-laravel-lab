@extends('layotus.app-master')

@section('content')

    <div class="container form-container w-25 border p-4 mt-4">
        <div class="row justify-content-center align-items-center g-2">
            <form action="{{ route('tasks.store') }}"  method="POST">
                @csrf
                @include('layotus.partials.messages')
                <div class="mb-3 row">
                    <div class="col">
                        <label for="title" class="col-4 col-form-label">Tarea</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Name">
                    </div>
                </div>


                <div class="mb-3 row">
                    <div class="col">
                        <label for="" class="form-label">Categorias</label>
                        <select class="form-select form-select" name="category_id" id="category_id">
                            <option selected style="display:none;">Seleccionar una</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                
                <div class="mb-3 row">
                    <div class="col d-flex justify-content-end">
                        <button type="submit" class="btn btn-success">Crear</button>
                    </div>
                </div>
            </form>


            @foreach($tareas as $tarea)
            <div class="row justify-content-center align-items-center g-2">
                <div class="col-md-7 d-flex align-items-center">
                    <a href="{{ route('tasks.show', ['task' => $tarea->id])}}" class="">{{$tarea->title}}</a>
                </div>
                <div class="col-md-2 d-flex align-items-center">
                    <span class='color-container p-2' style='background-color: {{$categories[0]->color}}'> </span>
                </div>
                <div class="col-md-3 d-flex justify-content-end">
                    <form action="{{ route('tasks.destroy',['task' => $tarea->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button name="" id="" class="btn btn-danger btn-sm">Borrar</button>
                    </form>
                </div>
            </div>
            @endforeach


        </div>
    </div>
@endsection