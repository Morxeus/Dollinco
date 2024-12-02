@extends('layouts.app')

@section('title', 'Dashboard')
   
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h2>{{ __('Escuela Dollinco - Nacimiento') }}</h2>
                </div>
                <div class="card-body text-center">
                    <!-- Imagen de la escuela -->
                    <img src="{{ asset('vendor/adminlte/dist/img/escuelaD.jpg') }}" 
                         alt="Escuela Dollinco" 
                         class="img-fluid mb-4" 
                         style="max-height: 300px; object-fit: cover; border-radius: 10px;">

                    <!-- Descripción de la escuela -->
                    <p class="lead">
                        La <strong>Escuela Dollinco</strong> es una institución educativa ubicada en la ciudad de Nacimiento. Con una larga trayectoria, nuestra escuela se dedica a proporcionar educación de calidad, enfocada en el crecimiento integral de sus estudiantes.
                    </p>
                    <p>
                        Estamos comprometidos con la excelencia académica y el desarrollo personal de nuestros alumnos, fomentando un ambiente de respeto y aprendizaje continuo.
                    </p>

                    <!-- Botón de contacto -->
                    <a href="{{ route('contacto') }}" class="btn btn-primary mt-3">
                        {{ __('Contáctanos para más información') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
