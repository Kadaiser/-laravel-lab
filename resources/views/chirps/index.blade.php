@extends('layotus.app-master')

@section('content')

    <div class="container bg-dark border w-50 p-4 mt-4">
        <div class="row g-2">
            <div class="col text-success"><h4>Publicar un comentario</h4></div>
        </div>
        <div class="row g-2">
            <div class="col text-success">
                <form method="POST" action="{{ route('chirps.store') }}">
                    @csrf
                    @include('layotus.partials.messages')
                    <div class="mb-2">
                        <label for="" class="form-label text-success">Que te cuentas?</label>
                        <textarea class="form-control" name="message" id="message" rows="4"></textarea>
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

    <div class="container bg-transparent">
        @foreach ($chirps as $chirp)
        <div class="row  {{ $chirp->user->is(auth()->user()) ? 'justify-content-end' : '' }}">

        
            <div class="col-11 bg-dark d-flex flex-column my-4 p-1 rounded chirp-container {{ $chirp->user->is(auth()->user()) ? 'yours' : 'others' }}"
             role="{{$chirp->user->getRole()}}"
             >
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link active text-success" aria-current="page" href="#!">{{ $chirp->user->username }}</a>
                    </li>

                    @if ($chirp->user->is(auth()->user()))
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-success" data-bs-toggle="dropdown" href="#!" role="button" aria-expanded="false">Acciones</a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item text-success"
                                        href="#!" 
                                        data-mdb-toggle="collapse"
                                        data-mdb-target=".multi-collapse-{{$chirp->id}}"
                                        aria-expanded="false"
                                        aria-controls="message{{$chirp->id}} edit{{$chirp->id}}"
                                    >Editar</a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                
                                <li><a class="dropdown-item text-success" href="#!" onclick="document.forms['delete-{{$chirp->id}}'].submit()">Borrar</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>

                <div class="d-flex flex-column chrip-message px-4 mb-4">
                    <div class="col">
                        <div class="collapse show multi-collapse-{{$chirp->id}} text-success" id="message{{$chirp->id}}">
                            {{ $chirp->message  }}
                        </div>
                    </div>
                </div>

                <form action="{{ route('chirps.update', $chirp) }}" id="edit-{{$chirp->id}}" method="POST">
                @method('PATCH')
                @csrf
                <div class="d-flex flex-column chrip-message px-4 mb-4">
                    <div class="col">
                        <div class="collapse multi-collapse-{{$chirp->id}}" id="edit{{$chirp->id}}">
                            <div class="d-flex justify-content-between mt-2">
                                <textarea class="form-control text-success" name="message" id="textarea{{$chirp->id}}" maxlength="255">{{ $chirp->message  }}</textarea>
                            </div>
                            
                            <div class="d-flex justify-content-between mt-2">
                                <h6 class="pull-right text-success" id="count_textarea{{$chirp->id}}">{{ 255 - strlen($chirp->message)  }} caracteres restantes</h6>
                                <div>
                                    <button 
                                        type="button" 
                                        class="btn btn-danger"
                                        data-mdb-toggle="collapse"
                                        data-mdb-target=".multi-collapse-{{$chirp->id}}"
                                        aria-expanded="false"
                                        aria-controls="message{{$chirp->id}} edit{{$chirp->id}}"
                                    >Cancelar</button>
                                    <input class="btn btn-success" type="submit" value="Editar">
                                </div>
                            </div>
                            <script>
                                document.getElementById("textarea{{$chirp->id}}").addEventListener("input", function(){
                                    const target = event.currentTarget;
                                    var maxLength = target.getAttribute("maxlength");
                                    document.getElementById("count_textarea{{$chirp->id}}").innerHTML = maxLength - target.value.length + " caracteres restantes";
                                });
                            </script>
                        </div>
                    </div>
                </div>


                <div class="d-flex flex-column">
                    <div class="col-auto text-success"><small>{{ $chirp->created_at->format('d/m/y g:i a') }}</small></div>
                    @unless ($chirp->created_at->eq($chirp->updated_at))
                    <div class="col-auto text-success"><small class="text-sm text-gray-600">{{ __('Editado el '.$chirp->updated_at->format('d/m/y g:i a')) }}</small></div>
                    @endunless
                </div>
                </form>

                <form action="{{ route('chirps.destroy', $chirp) }}" id="delete-{{$chirp->id}}" method="POST">
                @method('DELETE')
                @csrf
                </form>
                
            </div>

        </div>
        @endforeach
    </div>


@endsection