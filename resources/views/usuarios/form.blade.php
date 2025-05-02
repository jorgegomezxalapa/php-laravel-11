@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <hr>
                <h4>Registro de usuario</h4>
                <hr>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form id="form-users" action="{{ route('usuarios.store') }}" method="POST" novalidate>
                            @csrf
                        
                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                                <div class="invalid-feedback">Este campo es obligatorio.</div>
                            </div>
                        
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                                <div class="invalid-feedback">Ingrese un correo válido.</div>
                            </div>
                        
                            <button type="submit" class="btn btn-primary float-end">Guardar Usuario</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
