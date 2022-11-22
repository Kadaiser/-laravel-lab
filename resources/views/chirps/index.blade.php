@extends('layotus.app-master')

@section('content')

    <div class="container w-50 border p-4 mt-4">
        <div class="row g-2">
            <div class="col"><h4>Publicar un comentario</h4></div>
        </div>
        <div class="row g-2">
            <div class="col">
                <form method="POST" action="{{ route('chirps.store') }}">
                    @csrf
                    @include('layotus.partials.messages')
                    <div class="mb-2">
                        <label for="" class="form-label">Que te cuentas?</label>
                        <textarea class="form-control" name="message" id="message" rows="8"></textarea>
                    </div>
    
                    <div class="mt-4 row">
                        <div class="offset-sm-4 col-sm-8">
                            <button type="submit" class="btn btn-success">Publicar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @foreach ($chirps as $chirp)

    <div class="d-flex flex-column chirp-container my-4 p-2" role="{{$chirp->user->getRole()}}">
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">{{ $chirp->user->username }}</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Acciones</a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="#" onclick="document.forms['edit-{{$chirp->id}}'].submit()">Editar</a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#" onclick="document.forms['delete-{{$chirp->id}}'].submit()">Borrar</a></li>
                </ul>
            </li>
        </ul>

        <form action="{{ route('chirps.update',['chirp' => $chirp->id]) }}" id="edit-{{$chirp->id}}" method="POST">
        @method('PATCH')
        @csrf
        <div class="d-flex flex-column chrip-message px-4 mb-4">
            <div class="col">{{ $chirp->message  }}</div>
        </div>
        <div class="d-flex flex-column">
            <div class="col-auto"><small>{{ $chirp->created_at->format('d/m/y g:i a') }}</small></div>
        </div>
        </form>

        <form action="{{ route('chirps.destroy',['chirp' => $chirp->id]) }}" id="delete-{{$chirp->id}}" method="POST">
        @method('DELETE')
        @csrf
        </form>
    </div>

    @endforeach


@endsection