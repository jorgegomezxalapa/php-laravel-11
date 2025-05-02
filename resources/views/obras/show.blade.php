@extends('layouts.app')

@section('content')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <hr>
                <div class="d-flex justify-content-between align-items-center">
                    <h5>Detalle de la obra</h5>
                    @auth
                        <div>
                            <a class="btn btn-warning btn-sm" href="{{ route('obras.create', $obra->id) }}">Editar</a>
                            <button class="btn btn-danger btn-sm ms-2" data-bs-toggle="modal"
                                data-bs-target="#modalEliminarObra">Eliminar</button>
                        </div>
                    @endauth
                </div>
                <hr>
            </div>
            <div class="col-12">
                <div id="carouselExampleCaptions" class="carousel slide">
                    <div class="carousel-indicators">
                        @foreach (json_decode($obra->galeria_imagenes, true) as $index => $imagen)
                            <button type="button" data-bs-target="#carouselExampleCaptions"
                                data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"
                                aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                                aria-label="Slide {{ $index + 1 }}"></button>
                        @endforeach
                    </div>
                    <div class="carousel-inner">
                        @foreach (json_decode($obra->galeria_imagenes, true) as $index => $imagen)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <img src="{{ $imagen['url'] }}" class="d-block w-100" alt="Imagen de construcción">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>{{ $imagen['photographer'] }}</h5>
                                    <p>Foto por <a href="{{ $imagen['photographer_url'] }}"
                                            target="_blank">{{ $imagen['photographer'] }}</a></p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-12">
                <hr>
                <p><strong>Número de obra:</strong> {{ $obra->numero }}</p>
                <p><strong>Nombre de obra:</strong> {{ $obra->nombre }}</p>
                <p><strong>Objeto de la obra:</strong> {{ $obra->objeto }}</p>
                <p><strong>Incidentes de la obra:</strong>
                    {{ $obra->incidentes->count() ? 'Mostrar incidentes' : 'Asignar incidentes' }}</p>
            </div>
            <div class="col-12">
                <hr>
                <p><strong>Ubicación de la obra</strong></p>
                <div id="map" class="map-container"></div>
            </div>
            @auth
                <div class="col-12">
                    <hr>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route("obras.pdf", $obra->id) }}" target="_blank" class="btn btn-primary">Generar ficha de obra</a>
                    </div>
                </div>
            @endauth
        </div>
    </div>
    <div class="modal fade" id="modalEliminarObra" tabindex="-1" aria-labelledby="modalEliminarObraLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalEliminarObraLabel">Eliminar obra</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('obras.delete') }}" method="POST">
                    @csrf
                    <input type="hidden" name="obra_id" value="{{ @$obra->id }}">
                    <div class="modal-body">
                        <p>Al eliminar la obra no podrá recuperar la información, ¿Desea continuar?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Eliminar obra</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
