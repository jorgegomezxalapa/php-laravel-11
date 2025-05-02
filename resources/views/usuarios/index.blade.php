@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <hr>
                <div class="d-flex justify-content-between align-items-center">
                    <h4>Lista de usuarios</h4>
                    <a href="{{ route('usuarios.create') }}" class="btn btn-primary">Registrar usuario</a>
                </div>
                <hr>
            </div>
            <div class="col-md-8">
                <table class="table table-responsive table-bordered table-auto align-middle">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Fecha de registro</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                            <tr>
                                <td>{{ $usuario->name }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>{{ \Carbon\Carbon::parse($usuario->fecha_usuario)->format('d/m/Y') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    {{ $usuarios->onEachSide(5)->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
