@extends('layouts.app')

@section('template_title')
    {{ $reunion->name ?? __('Mostrar Reunión') }}
@endsection

@section('content')
<section class="content container-fluid d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="row justify-content-center">
        <div class="col-auto">
            <div class="card shadow rounded">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex flex-column align-items-center">
                        <h5 class="mb-3">Información de la Reunión</h5>
                        <a class="btn btn-sm btn-secondary" href="{{ route('reunions.index') }}">
                            <i class="fas fa-arrow-left"></i> Volver
                        </a>
                    </div>
                </div>
                <div class="card-body bg-light">
                    <table class="table table-bordered" style="background-color: #f7f7f7; color: #000;">
                        <tbody>
                            <tr>
                                <th scope="row" class="text-end">ID de la Reunión:</th>
                                <td>{{ $reunion->IdReunion }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-end">Tipo de Reunión:</th>
                                <td>{{ $reunion->TipoReunion }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-end">Fecha de Inicio:</th>
                                <td>{{ $reunion->FechaInicio }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-end">Fecha de Fin:</th>
                                <td>{{ $reunion->FechaFin }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-end">Descripción de la Reunión:</th>
                                <td>{{ $reunion->DescripcionReunion }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-end">RUT del Profesor:</th>
                                <td>{{ $reunion->RunProfesor }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
