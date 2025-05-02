@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <hr>
                <div class="d-flex justify-content-between align-items-center">
                    <h4>Lista de incidentes</h4>
                    <a href="{{ route('incidentes.create') }}" class="btn btn-primary">Registrar Incidente</a>
                </div>
                <hr>
            </div>
            <div class="col-md-8">
                <table class="table table-responsive table-bordered table-auto align-middle">
                    <thead>
                        <tr>
                            <th>Tipo de Incidente</th>
                            <th>Descripción</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($incidentes as $incidente)
                            <tr>
                                <td>{{ $incidente->tipo_incidente }}</td>
                                <td>{{ $incidente->descripcion }}</td>
                                <td>{{ \Carbon\Carbon::parse($incidente->fecha_incidente)->format('d/m/Y') }}
                                </td>
                                <td>
                                    <a class="btn btn-warning btn-sm" href="{{ route('incidentes.create', $incidente->id) }}">Editar</a>
                                    <button type="button" class="btn btn-danger btn-sm btn-eliminar-incidente" data-bs-toggle="modal"
                                    data-bs-target="#modalEliminarIncidente" data-incidente_id="{{ @$incidente->id }}">Eliminar</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    {{ $incidentes->onEachSide(5)->links() }}
                </div>
            </div>
        </div>
    </div>
    @include("incidentes._modal_eliminar_incidente")
@endsection
