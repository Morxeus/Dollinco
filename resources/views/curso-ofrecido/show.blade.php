@extends('layouts.app')

@section('template_title')
    {{ $cursoOfrecido->name ?? __('Show') . " " . __('Curso Ofrecido') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Curso Ofrecido</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('curso-ofrecidos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Idcursoofrecido:</strong>
                                    {{ $cursoOfrecido->IDCursoOfrecido }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Año:</strong>
                                    {{ $cursoOfrecido->Año }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Idcurso:</strong>
                                    {{ $cursoOfrecido->IDCurso }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Letra:</strong>
                                    {{ $cursoOfrecido->Letra }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Cupos:</strong>
                                    {{ $cursoOfrecido->Cupos }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Idperiodo:</strong>
                                    {{ $cursoOfrecido->IDPeriodo }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
