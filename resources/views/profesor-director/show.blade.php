@extends('layouts.app')

@section('template_title')
    {{ $profesorDirector->name ?? __('Show') . " " . __('Profesor Director') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Profesor Director</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('profesor-directors.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Runprofesor:</strong>
                                    {{ $profesorDirector->RunProfesor }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombres:</strong>
                                    {{ $profesorDirector->Nombres }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Apellidos:</strong>
                                    {{ $profesorDirector->Apellidos }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Correo:</strong>
                                    {{ $profesorDirector->Correo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Contrasena:</strong>
                                    {{ $profesorDirector->Contrasena }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
