@extends('layouts.app')

@section('template_title')
    {{ $reunion->name ?? __('Show') . " " . __('Reunion') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Reunion</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('reunions.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Idreunion:</strong>
                                    {{ $reunion->IdReunion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tiporeunion:</strong>
                                    {{ $reunion->TipoReunion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fechainicio:</strong>
                                    {{ $reunion->FechaInicio }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fechafin:</strong>
                                    {{ $reunion->FechaFin }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Descripcionreunion:</strong>
                                    {{ $reunion->DescripcionReunion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Runprofesor:</strong>
                                    {{ $reunion->RunProfesor }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
