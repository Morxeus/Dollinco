@extends('layouts.app')

@section('template_title')
    {{ $apoderado->name ?? __('Show') . " " . __('Apoderado') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Apoderado</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('apoderados.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Runapoderado:</strong>
                                    {{ $apoderado->RunApoderado }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombres:</strong>
                                    {{ $apoderado->Nombres }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Apellidos:</strong>
                                    {{ $apoderado->Apellidos }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Correo:</strong>
                                    {{ $apoderado->Correo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Telefono:</strong>
                                    {{ $apoderado->Telefono }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Contraseña:</strong>
                                    {{ $apoderado->Contraseña }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Genero:</strong>
                                    {{ $apoderado->Genero }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Direccion:</strong>
                                    {{ $apoderado->Direccion }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
