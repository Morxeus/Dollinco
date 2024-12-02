@extends('layouts.app')

@section('template_title')
    {{ $alumno->name ?? __('Show') . " " . __('Alumno') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card bg-red">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Información') }} Alumno</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('alumnos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Runalumno:</strong>
                                    {{ $alumno->RunAlumno }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombres:</strong>
                                    {{ $alumno->Nombres }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Apellidos:</strong>
                                    {{ $alumno->Apellidos }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fechanacimiento:</strong>
                                    {{ $alumno->FechaNacimiento }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Genero:</strong>
                                    {{ $alumno->Genero }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Direccion:</strong>
                                    {{ $alumno->Direccion }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
