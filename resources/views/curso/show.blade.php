@extends('layouts.app')

@section('template_title')
    {{ $curso->name ?? __('Show') . " " . __('Curso') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Curso</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('cursos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Idcurso:</strong>
                                    {{ $curso->IDCurso }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Año:</strong>
                                    {{ $curso->Año }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombrecurso:</strong>
                                    {{ $curso->NombreCurso }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
