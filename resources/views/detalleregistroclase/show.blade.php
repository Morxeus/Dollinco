@extends('layouts.app')

@section('template_title')
    {{ $detalleregistroclase->name ?? __('Mostrar Detalle Registro de Clase') }}
@endsection

@section('content')
<section class="content container-fluid d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="row justify-content-center">
        <div class="col-auto">
            <div class="card shadow rounded">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex flex-column align-items-center">
                        <h5 class="mb-3">Información del Detalle del Registro de Clase</h5>
                        <a class="btn btn-sm btn-secondary" href="{{ route('detalleregistroclases.index') }}">
                            <i class="fas fa-arrow-left"></i> Volver
                        </a>
                    </div>
                </div>
                <div class="card-body bg-light">
                    <table class="table table-bordered" style="background-color: #f7f7f7; color: #000;">
                        <tbody>
                            <tr>
                                <th scope="row" class="text-end">ID del Detalle Registro de Clase:</th>
                                <td>{{ $detalleregistroclase->IdDetalleRegistroClase }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-end">Nota de Evaluación:</th>
                                <td>{{ $detalleregistroclase->NotaEvaluacion }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-end">ID del Registro de Clases:</th>
                                <td>{{ $detalleregistroclase->IdRegistroClases }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-end">Número de Matrícula:</th>
                                <td>{{ $detalleregistroclase->NumeroMatricula }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-end">ID de Evaluación:</th>
                                <td>{{ $detalleregistroclase->IdEvaluacion }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-end">ID de Asistencia:</th>
                                <td>{{ $detalleregistroclase->IdAsistencia }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
