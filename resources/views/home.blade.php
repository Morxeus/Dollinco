@extends('layouts.app')

@section('title', 'Dashboard')
   
@section('content')
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-gradient-primary text-white text-center py-4">
                    <h2 class="mb-0">{{ __('Escuela Básica Dollinco - Nacimiento') }}</h2>
                </div>
                <div class="card-body">
                    <!-- Imagen de la escuela -->
                    <div class="text-center mb-4">
                        <img src="{{ asset('vendor/adminlte/dist/img/escuelaD.jpg') }}" 
                             alt="Escuela Dollinco" 
                             class="img-fluid rounded shadow-sm" 
                             style="max-height: 300px; object-fit: cover;">
                    </div>

                    <!-- Descripción de la escuela -->
                    <p class="lead text-center" style="text-align: justify;">
                        La <strong>Escuela Básica Dollinco</strong> es una institución educativa ubicada en la ciudad de Nacimiento. Con una larga trayectoria, nuestra escuela se dedica a proporcionar educación de calidad, enfocada en el crecimiento integral de sus estudiantes.
                    </p>
                    <p class="text-center" style="text-align: justify;">
                        Estamos comprometidos con la excelencia académica y el desarrollo personal de nuestros alumnos, fomentando un ambiente de respeto y aprendizaje continuo.
                    </p>

                    <!-- Información del establecimiento -->
                    <div class="bg-light p-4 rounded shadow-sm mt-4">
                        <h5 class="text-primary text-center mb-4"><strong>Información del Establecimiento</strong></h5>
                        <div class="row">
                            <div class="col-md-6 text-center">
                                <p><strong>R.B.D:</strong> 4456-3</p>
                                <p><strong>Dirección:</strong> Camino a Santa Juana Km. 12</p>
                                <p><strong>Correo:</strong> <a href="mailto:gercis1@gmail.com">gercis1@gmail.com</a></p>
                            </div>
                            <div class="col-md-6 text-center">
                                <p><strong>Profesor Encargado:</strong> Sr. Gerardo Cisternas</p>
                                <p><strong>Página Web:</strong> <a href="http://www.escueladollinco.cl" target="_blank">www.escueladollinco.cl</a></p>
                                <p><strong>Facebook:</strong> <a href="https://facebook.com/Escuela-Dollinco-104276196777514/" target="_blank">facebook.com/Escuela-Dollinco</a></p>
                            </div>
                        </div>
                    </div>

                    <!-- Misión y Visión -->
                    <div class="mt-4">
                        <div class="bg-white p-4 rounded shadow-sm">
                            <h5 class="text-success"><strong>MISIÓN</strong></h5>
                            <p style="text-align: justify;">
                                Brindar las oportunidades para que todos los alumnos alcancen aprendizajes de calidad en forma integral y de acuerdo a sus propias potencialidades, en una interacción abierta, fluida y afectiva entre todos los miembros de la comunidad escolar, sin ningún tipo de discriminación y promoviendo valores propios de la cultura occidental como el respeto, tolerancia, responsabilidad, empatía, honradez, entre otros.
                            </p>
                        </div>

                        <div class="bg-white p-4 rounded shadow-sm mt-4">
                            <h5 class="text-success"><strong>VISIÓN</strong></h5>
                            <p style="text-align: justify;">
                                Queremos contribuir a formar alumnos que adquieran habilidades metacognitivas, respetuosos de las normas, de ellos mismos, de sus pares, de las personas en general y de su medio ambiente y que además desarrollen las competencias necesarias que les permitan continuar sus estudios en forma exitosa y también este éxito se replique en el plano personal, familiar y social.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection