@extends('layouts.app')

@section('template_title')
    {{ $detalleregistroclase->name ?? __('Show') . " " . __('Detalleregistroclase') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Detalleregistroclase</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('detalleregistroclases.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Iddetalleregistroclase:</strong>
                                    {{ $detalleregistroclase->IdDetalleRegistroClase }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Notaevaluacion:</strong>
                                    {{ $detalleregistroclase->NotaEvaluacion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Idregistroclases:</strong>
                                    {{ $detalleregistroclase->IdRegistroClases }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Numeromatricula:</strong>
                                    {{ $detalleregistroclase->NumeroMatricula }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Idevaluacion:</strong>
                                    {{ $detalleregistroclase->IdEvaluacion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Idanotacion:</strong>
                                    {{ $detalleregistroclase->IdAnotacion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Idasistencia:</strong>
                                    {{ $detalleregistroclase->IdAsistencia }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
