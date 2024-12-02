@extends('layouts.app')

@section('template_title')
    {{ $profesorClase->name ?? __('Show') . " " . __('Profesor Clase') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Profesor Clase</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('profesor-clases.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Idprofesorclase:</strong>
                                    {{ $profesorClase->IDProfesorClase }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Idregistrodeclase:</strong>
                                    {{ $profesorClase->IDRegistrodeClase }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Runprofesor:</strong>
                                    {{ $profesorClase->RunProfesor }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
