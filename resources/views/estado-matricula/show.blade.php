@extends('layouts.app')

@section('template_title')
    {{ $estadoMatricula->name ?? __('Show') . " " . __('Estado Matricula') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Estado Matricula</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('estado-matriculas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Idmatriculaestado:</strong>
                                    {{ $estadoMatricula->IDMatriculaEstado }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Estadomatricula:</strong>
                                    {{ $estadoMatricula->EstadoMatricula }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
