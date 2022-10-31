@extends('app')

@section('content')

    <div class="container w-25 border p-4 mt-4">
        <div class="row justify-content-center align-items-center g-2">
            <form action="{{ route('categories.update',['category' => $category->id]) }}"  method="POST">
                @method('PATCH')
                @csrf
                <div class="mb-3 row">
                    <label for="title" class="col-4 col-form-label">Categoria</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{$category->name}}">
                </div>

                <div class="mb-3 row">
                    <label for="title" class="col-4 col-form-label">Color</label>
                    <input type="color" class="form-control" name="color" id="color" placeholder="color" value="{{$category->color}}">
                </div>
                
                <div class="mb-3 row">
                    <div class="col d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </div>
            </form>


            @if ($category->tasks->count() > 0)
            <div class="row justify-content-center align-items-center g-2">
                    @foreach ($category->tasks as $task)
                        <div class="col-md-9 d-flex align-items-center">
                            <a href="{{ route('tasks.show', ['task' => $task->id])}}" class="">{{$task->title}}</a>
                        </div>

                        <div class="col-md-3 d-flex justify-content-end">
                            <form action="{{ route('tasks.destroy',['task' => $task->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button name="" id="" class="btn btn-danger btn-sm">Borrar</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            @else
                No hay tareas en esta categoria
            @endif


        </div>
    </div>

@endsection