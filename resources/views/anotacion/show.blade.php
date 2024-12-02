@extends('layouts.app')

@section('template_title')
    {{ $anotacion->name ?? __('Show') . " " . __('Anotacion') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Anotacion</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('anotacions.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Idanotacion:</strong>
                                    {{ $anotacion->IdAnotacion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tipoanotacion:</strong>
                                    {{ $anotacion->TipoAnotacion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Descripcionanotacion:</strong>
                                    {{ $anotacion->DescripcionAnotacion }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
