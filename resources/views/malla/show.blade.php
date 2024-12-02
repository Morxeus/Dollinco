@extends('layouts.app')

@section('template_title')
    {{ __('Detalles de Malla') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card shadow-sm">
                    <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
                        <h5 class="mb-0">{{ __('Detalles de Malla') }}</h5>
                        <a class="btn btn-light btn-sm" href="{{ route('mallas.index') }}">
                            <i class="fa fa-arrow-left"></i> {{ __('Volver') }}
                        </a>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <th scope="row" class="text-right text-muted">{{ __('ID Curso Asignatura:') }}</th>
                                    <td>{{ $malla->IDCursoAsignatura }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-right text-muted">{{ __('Curso:') }}</th>
                                    <td>{{ $malla->curso->NombreCurso ?? 'No disponible' }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-right text-muted">{{ __('Asignatura:') }}</th>
                                    <td>{{ $malla->asignatura->NombreAsignatura ?? 'No disponible' }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-right text-muted">{{ __('Número Matrícula:') }}</th>
                                    <td>{{ $malla->matricula->NumeroMatricula ?? 'No disponible' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer text-center bg-light">
                        <a href="{{ route('mallas.index') }}" class="btn btn-outline-secondary">
                            <i class="fa fa-arrow-left"></i> {{ __('Regresar a la lista de Mallas') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
