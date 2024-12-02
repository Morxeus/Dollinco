@extends('layouts.app')

@section('template_title')
    {{ $asignatura->name ?? __('Show') . " " . __('Asignatura') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Asignatura</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('asignaturas.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        @hasanyrole('administrador|profesor')
                                <div class="form-group mb-2 mb20">
                                    <strong>Idasignatura:</strong>
                                    {{ $asignatura->IDAsignatura }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombreasignatura:</strong>
                                    {{ $asignatura->NombreAsignatura }}
                                </div>
                        @else
                        <div class="alert alert-danger text-center mt-4">
                            <strong>{{ __('No tienes los permisos para realizar esta acción.') }}</strong>
                        </div>
                        @endhasanyrole

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
