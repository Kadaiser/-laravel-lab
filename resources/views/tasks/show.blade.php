@extends('layotus.app-master')

@section('content')

    <div class="container w-25 border p-4 mt-4">
        <form action="{{ route('tasks.update', ['task' => $task->id]) }}"  method="POST">
            @method('PATCH')
            @csrf
            @include('layotus.partials.messages')

            <div class="mb-3 row">
                    <div class="col">
                        <label for="title" class="col-4 col-form-label">Tarea</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Name" value="{{$task->title}}">
                    </div>
                </div>

            <div class="mb-3 row">
                    <div class="col">
                        <label for="" class="form-label">Categoria</label>
                        <select class="form-select form-select" name="category_id" id="category_id">
                            @foreach ($categories as $category)
                                @if ($category->id == $task->category_id)
                                    <option value="{{$category->id}}" selected>{{$category->name}}</option>  
                                @else
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            
            <div class="mb-3 row">
                <div class="offset-sm-2 col-sm-4">
                    <button type="submit" class="btn btn-success">Actualizar</button>
                </div>
                </form>
                <div class="offset-sm-2 col-sm-4">
                    <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button name="" id="" class="btn btn-danger">Borrar</button>
                    </form>
                </div>
            </div>

    </div>
@endsection