@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <h4>Registro de incidentes</h4>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('obras.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="obra_id" id="obra_id" value="{{ @$obra->id }}">
                            <div class="mb-3">
                                <label for="numero_obra" class="form-label">Número de Obra</label>
                                <input type="number" class="form-control" name="numero_obra" id="numero_obra"
                                    min="100" max="999" value="{{ @$obra->numero }}" required>
                                <div class="invalid-feedback">Debe ser un número entre 100 y 999.</div>
                            </div>
                            <div class="mb-3">
                                <label for="nombre_obra" class="form-label">Nombre de la Obra</label>
                                <input type="text" class="form-control" name="nombre_obra" id="nombre_obra"
                                    maxlength="100" value="{{ @$obra->nombre }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="clave_obra" class="form-label">Clave de Obra</label>
                                <input type="text" class="form-control" name="clave_obra" id="clave_obra"
                                    pattern="^GT2025-[A-Z]{3}/\d{2}$" value="{{ @$obra->clave }}" required>
                                <div class="invalid-feedback">Formato esperado: GT2025-XXX/## (Ej. GT2025-DGO/02).</div>
                            </div>
                            <div class="mb-3">
                                <label for="objeto_obra" class="form-label">Objeto de la Obra</label>
                                <textarea class="form-control" name="objeto_obra" id="objeto_obra" rows="3" required>{{ @$obra->objeto }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="direccion" class="form-label">Dirección de la Obra</label>
                                <input type="text" class="form-control" name="direccion" id="direccion"
                                    value="{{ @$obra->direccion }}" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="latitud" class="form-label">Latitud</label>
                                    <input type="text" class="form-control" name="latitud" id="latitud"
                                        value="{{ @$obra->latitud }}" required>
                                    <div class="invalid-feedback">Debe ser un valor entre -90 y 90.</div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="longitud" class="form-label">Longitud</label>
                                    <input type="text" class="form-control" name="longitud" id="longitud"
                                        value="{{ @$obra->longitud }}" required>
                                    <div class="invalid-feedback">Debe ser un valor entre -180 y 180.</div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">{{ @$obra ? 'Editar' : 'Guardar' }}
                                    Obra</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
