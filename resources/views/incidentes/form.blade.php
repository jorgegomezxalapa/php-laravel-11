@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <hr>
                <h4>Registro de incidente</h4>
                <hr>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form id="form-incidentes" action="{{ route('incidentes.store') }}" method="POST" novalidate>
                            @csrf
                            <input type="hidden" name="incidente_id" value="{{ @$incidente->id }}">
                            <div class="mb-3">
                                <label for="tipo_incidente" class="form-label">Tipo de Incidente</label>
                                <input type="text" value="{{ @$incidente->tipo_incidente }}" class="form-control" id="tipo_incidente" name="tipo_incidente" required>
                                <div class="invalid-feedback">Este campo es obligatorio.</div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción del Incidente</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" rows="4" required>{{ @$incidente->descripcion }}</textarea>
                                <div class="invalid-feedback">Este campo es obligatorio.</div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="fecha_incidente" class="form-label">Fecha del Incidente</label>
                                <input type="date" value="{{ @$incidente->fecha_incidente }}" class="form-control" id="fecha_incidente" name="fecha_incidente" required>
                                <div class="invalid-feedback">Debes seleccionar una fecha válida.</div>
                            </div>
                            <button type="submit"
                                class="btn btn-primary float-end">{{ @$incidente->id ? 'Editar' : 'Registrar' }}
                                Incidente</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
