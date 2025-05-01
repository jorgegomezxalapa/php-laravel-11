@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <hr>
                <h4>Listado de obras</h4>
                <hr>
            </div>
            <div class="col-12">
                <table class="table table-responsive table-bordered table-auto align-middle">
                    <thead>
                        <tr>
                            <th>Número de obra</th>
                            <th>Nombre</th>
                            <th>Imagen</th>
                            <th>Objeto de la obra</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($obras as $obra)
                            <tr class="text-center">
                                <td>{{ $obra->numero }}</td>
                                <td>{{ $obra->nombre }}</td>
                                <td>
                                    <img src="https://constructorainsur.com/wp-content/uploads/2022/11/img_obracivil-161.jpg"
                                        class="img-thumbnail fixed-img" alt="Imagen de obra">
                                </td>
                                <td>
                                    <div class="scroll-text">{{ $obra->objeto }}</div>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('obras.show', $obra->id) }}" class="btn btn-info btn-sm">
                                            Ver detalle
                                        </a>
                                        @auth
                                            <button type="button" class="btn btn-primary btn-sm">
                                                Generar ficha
                                            </button>
                                        @endauth
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No hay obras disponibles.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
