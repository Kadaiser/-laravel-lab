@extends('app')

@section('content')

    <div class="container w-25 border p-4 mt-4">
        <div class="row justify-content-center align-items-center g-2">
            <form action="{{ route('categories.store') }}"  method="POST">
                @csrf
                @if (session('success'))
                    <h6 class="alert alert-success">{{ session('success')}}</h6>  
                @endif

                @error('name')
                    <h6 class="alert alert-danger">{{ $message }}</h6>  
                @enderror
                <div class="mb-3 row">
                    <label for="title" class="col-4 col-form-label">Categoria</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                </div>

                <div class="mb-3 row">
                    <label for="title" class="col-4 col-form-label">Color</label>
                    <input type="color" class="form-control" name="color" id="color" placeholder="color">
                </div>
                
                <div class="mb-3 row">
                    <div class="col d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </div>
                </div>
            </form>


            @foreach($categories as $category)

            <div class="row justify-content-center align-items-center g-2">
                <div class="col-md-9 d-flex align-items-center">
                    <span class='color-container p-2' style='background-color: {{$category->color}}'> </span> &nbsp
                    <a class="d-flex align-items-center gap-2" href="{{ route('categories.show', ['category' => $category->id]) }}">
                        {{$category->name}}
                    </a>
                </div>
                <div class="col-md-3 d-flex justify-content-end">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal{{$category->id}}">
                        Eliminar
                        </button>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="modal{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmar operación</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            La elimianción de la etiqueta <strong>{{$category->name}}</strong> eliminara tambien todas las tareas vinculadas a la categoria.<br/><br/>¿Estas seguro?
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

                            <form action="{{ route('categories.destroy',['category' => $category->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger">Confirmar</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

@endsection