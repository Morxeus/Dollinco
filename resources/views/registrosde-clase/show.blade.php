@extends('layouts.app')

@section('template_title')
    {{ $registrosdeClase->name ?? __('Show') . " " . __('Registrosde Clase') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Registrosde Clase</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('registrosde-clases.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Idregistrodeclase:</strong>
                                    {{ $registrosdeClase->IDRegistrodeClase }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Idcursoasignatura:</strong>
                                    {{ $registrosdeClase->IDCursoAsignatura }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Numeromatricula:</strong>
                                    {{ $registrosdeClase->NumeroMatricula }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Idevaluacion:</strong>
                                    {{ $registrosdeClase->IDEvaluacion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Idasistencia:</strong>
                                    {{ $registrosdeClase->IDAsistencia }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Idanotacion:</strong>
                                    {{ $registrosdeClase->IDAnotacion }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
