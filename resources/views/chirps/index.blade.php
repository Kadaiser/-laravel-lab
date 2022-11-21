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

    <div class="container">
        @foreach ($chirps as $chirp)
        <div class="row justify-content-center align-items-center g-2">
            <div class="col">{{ $chirp->user->name }}</div>
        </div>
        <div class="row justify-content-center align-items-center g-2">
            <div class="col">{{ $chirp->message  }}</div>
        </div>
        <div class="row justify-content-center align-items-center g-2">
            <div class="col">{{ $chirp->created_at->format('d/m/y g:i a') }}</div>
        </div>
        @endforeach
    </div>

@endsection