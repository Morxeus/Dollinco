@extends('layouts.app')

@section('template_title')
    {{ $evaluacion->name ?? __('Mostrar Evaluación') }}
@endsection

@section('content')
<section class="content container-fluid d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="row justify-content-center">
        <div class="col-auto">
            <div class="card shadow rounded">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex flex-column align-items-center">
                        <h5 class="mb-3">Información de la Evaluación</h5>
                        <a class="btn btn-sm btn-secondary" href="{{ route('evaluacions.index') }}">
                            <i class="fas fa-arrow-left"></i> Volver
                        </a>
                    </div>
                </div>
                <div class="card-body bg-light">
                    <table class="table table-bordered" style="background-color: #f7f7f7; color: #000;">
                        <tbody>
                            <tr>
                                <th scope="row" class="text-end">ID de la Evaluación:</th>
                                <td>{{ $evaluacion->IdEvaluacion }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-end">Nombre de la Evaluación:</th>
                                <td>{{ $evaluacion->NombreEvaluacion }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-end">Descripción de la Evaluación:</th>
                                <td>{{ $evaluacion->DescripcionEvaluacion }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-end">Fecha de la Evaluación:</th>
                                <td>{{ $evaluacion->FechaEvaluacion }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection