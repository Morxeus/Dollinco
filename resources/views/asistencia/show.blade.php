@extends('layouts.app')

@section('template_title')
    {{ $asistencia->IDAsistencia ?? __('Mostrar Asistencia') }}
@endsection

@section('content')
<section class="content container-fluid d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="row justify-content-center">
        <div class="col-auto">
            <div class="card shadow rounded">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex flex-column align-items-center">
                        <h5 class="mb-3">Información de la Asistencia</h5>
                        <a class="btn btn-sm btn-secondary" href="{{ route('asistencias.index') }}">
                            <i class="fas fa-arrow-left"></i> Volver
                        </a>
                    </div>
                </div>
                <div class="card-body bg-light">
                    <table class="table table-bordered" style="background-color: #f7f7f7; color: #000;">
                        <tbody>
                            <tr>
                                <th scope="row" class="text-end">ID de la Asistencia:</th>
                                <td>{{ $asistencia->IDAsistencia }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-end">Estado de la Asistencia:</th>
                                <td>{{ $asistencia->EstadoAsistencia }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection