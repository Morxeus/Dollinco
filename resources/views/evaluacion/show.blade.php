@extends('layouts.app')

@section('template_title')
    {{ $evaluacion->name ?? __('Show') . " " . __('Evaluacion') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Evaluacion</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('evaluacions.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Idevaluacion:</strong>
                                    {{ $evaluacion->IdEvaluacion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombreevaluacion:</strong>
                                    {{ $evaluacion->NombreEvaluacion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Descripcionevaluacion:</strong>
                                    {{ $evaluacion->DescripcionEvaluacion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fechaevaluacion:</strong>
                                    {{ $evaluacion->FechaEvaluacion }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
