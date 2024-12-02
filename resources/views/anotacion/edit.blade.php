@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Anotacion
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Anotacion</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('anotacions.update', $anotacion->IDAnotacion) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('anotacion.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
