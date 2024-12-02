@extends('layouts.app')

@section('template_title')
    {{ $malla->name ?? __('Show') . " " . __('Malla') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Malla</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('mallas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Idmalla:</strong>
                                    {{ $malla->IdMalla }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombremalla:</strong>
                                    {{ $malla->NombreMalla }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Idcurso:</strong>
                                    {{ $malla->IdCurso }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Idasignatura:</strong>
                                    {{ $malla->IdAsignatura }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Numeromatricula:</strong>
                                    {{ $malla->NumeroMatricula }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Runprofesor:</strong>
                                    {{ $malla->RunProfesor }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
