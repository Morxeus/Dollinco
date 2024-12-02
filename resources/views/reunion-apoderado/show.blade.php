@extends('layouts.app')

@section('template_title')
    {{ $reunionApoderado->name ?? __('Show') . " " . __('Reunion Apoderado') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Reunion Apoderado</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('reunion-apoderados.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Idreunionapoderado:</strong>
                                    {{ $reunionApoderado->IDReunionApoderado }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Asistencia:</strong>
                                    {{ $reunionApoderado->Asistencia }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Horainicioreunionapoderado:</strong>
                                    {{ $reunionApoderado->HoraInicioReunionApoderado }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Horafinreunionapoderado:</strong>
                                    {{ $reunionApoderado->HoraFinReunionApoderado }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Runapoderado:</strong>
                                    {{ $reunionApoderado->RunApoderado }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Idreunion:</strong>
                                    {{ $reunionApoderado->IDReunion }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
