@extends('layouts.app')

@section('template_title')
    {{ __('Crear') }} Asignatura
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    @hasanyrole('administrador|profesor')
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Asignatura</span>
                    </div>
                    @endhasanyrole
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('asignaturas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('asignatura.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
