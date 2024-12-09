@extends('layouts.app')

@section('template_title')
    {{ $apoderado->name ?? __('Mostrar Apoderado') }}
@endsection

@section('content')
<section class="content container-fluid d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="row justify-content-center">
        <div class="col-auto">
            <div class="card shadow rounded">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex flex-column align-items-center">
                        <h5 class="mb-3">Información del Apoderado</h5>
                        <a class="btn btn-sm btn-secondary" href="{{ route('apoderados.index') }}">
                            <i class="fas fa-arrow-left"></i> Volver
                        </a>
                    </div>
                </div>
                <div class="card-body bg-light">
                    <table class="table table-bordered" style="background-color: #f7f7f7; color: #000;">
                        <tbody>
                            <tr>
                                <th scope="row" class="text-end">RUT del Apoderado:</th>
                                <td>{{ $apoderado->RunApoderado }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-end">Nombres:</th>
                                <td>{{ $apoderado->Nombres }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-end">Apellidos:</th>
                                <td>{{ $apoderado->Apellidos }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-end">Correo:</th>
                                <td>{{ $apoderado->Correo }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-end">Teléfono:</th>
                                <td>{{ $apoderado->Telefono }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-end">Género:</th>
                                <td>{{ $apoderado->Genero }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-end">Dirección:</th>
                                <td>{{ $apoderado->Direccion }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
