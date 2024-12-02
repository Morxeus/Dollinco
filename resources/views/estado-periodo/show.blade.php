@extends('layouts.app')

@section('template_title')
    {{ $estadoPeriodo->name ?? __('Show') . " " . __('Estado Periodo') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Estado Periodo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('estado-periodos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Idperiodoe:</strong>
                                    {{ $estadoPeriodo->IDPeriodoE }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombreestado:</strong>
                                    {{ $estadoPeriodo->NombreEstado }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
