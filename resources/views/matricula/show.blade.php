@extends('layouts.app')

@section('template_title')
    {{ $matricula->NumeroMatricula ?? __('Show') . " " . __('Matricula') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
                        <h5 class="card-title m-0">{{ __('Detalles de la Matrícula') }}</h5>
                        <a class="btn btn-light btn-sm" href="{{ route('matriculas.index') }}">
                            <i class="fas fa-arrow-left"></i> {{ __('Regresar') }}
                        </a>
                    </div>

                    <div class="card-body bg-light">
                        <!-- Información de la matrícula -->
                        <h5 class="border-bottom pb-2 mb-3"><i class="fas fa-id-card"></i> Información de Matrícula</h5>
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <strong>Número de Matrícula:</strong> {{ $matricula->NumeroMatricula ?? 'No disponible' }}
                            </div>
                            <div class="col-md-6 mb-2">
                                <strong>Fecha de Inscripción:</strong> {{ $matricula->FechaInscripcion }}
                            </div>
                            <div class="col-md-6 mb-2">
                                <strong>Estado de Matrícula:</strong> {{ $matricula->estadoMatricula->EstadoMatricula ?? 'No disponible' }}
                            </div>
                        </div>

                        <!-- Información del Alumno -->
                        <h5 class="border-bottom pb-2 mt-4 mb-3"><i class="fas fa-user-graduate"></i> Información del Alumno</h5>
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <strong>RUN del Alumno:</strong> {{ $matricula->alumno->RunAlumno ?? 'No disponible' }}
                            </div>
                            <div class="col-md-6 mb-2">
                                <strong>Nombre:</strong> {{ $matricula->alumno->Nombres ?? 'No disponible' }}
                            </div>
                            <div class="col-md-6 mb-2">
                                <strong>Apellidos:</strong> {{ $matricula->alumno->Apellidos ?? 'No disponible' }}
                            </div>
                            <div class="col-md-6 mb-2">
                                <strong>Fecha de Nacimiento:</strong> {{ $matricula->alumno->FechaNacimiento ?? 'No disponible' }}
                            </div>
                            <div class="col-md-6 mb-2">
                                <strong>Género:</strong> {{ $matricula->alumno->Genero ?? 'No disponible' }}
                            </div>
                            <div class="col-md-6 mb-2">
                                <strong>Dirección:</strong> {{ $matricula->alumno->Direccion ?? 'No disponible' }}
                            </div>
                        </div>

                        <!-- Información del Apoderado -->
                        <h5 class="border-bottom pb-2 mt-4 mb-3"><i class="fas fa-user-tie"></i> Información del Apoderado</h5>
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <strong>RUN del Apoderado:</strong> {{ $matricula->apoderado->RunApoderado ?? 'No disponible' }}
                            </div>
                            <div class="col-md-6 mb-2">
                                <strong>Nombre:</strong> {{ $matricula->apoderado->Nombres ?? 'No disponible' }}
                            </div>
                            <div class="col-md-6 mb-2">
                                <strong>Apellidos:</strong> {{ $matricula->apoderado->Apellidos ?? 'No disponible' }}
                            </div>
                            <div class="col-md-6 mb-2">
                                <strong>Correo:</strong> {{ $matricula->apoderado->Correo ?? 'No disponible' }}
                            </div>
                            <div class="col-md-6 mb-2">
                                <strong>Teléfono:</strong> {{ $matricula->apoderado->Telefono ?? 'No disponible' }}
                            </div>
                            <div class="col-md-6 mb-2">
                                <strong>Dirección:</strong> {{ $matricula->apoderado->Direccion ?? 'No disponible' }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
