@extends('layouts.app')

@section('template_title')
    Informe de Anotaciones por Alumno
@endsection

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm rounded">
                <div class="card-header bg-primary text-white">
                    <h1 class="h4 mb-0 text-center">Informe de Anotaciones por Alumno</h1>
                </div>
                <div class="card-body bg-light">
                    @if($resultados->isEmpty())
                        <div class="alert alert-warning text-center" role="alert">
                            No hay anotaciones registradas para los alumnos.
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">RUN</th>
                                        <th scope="col">Alumno</th>
                                        <th scope="col">Tipo de Anotación</th>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">Fecha de Clase</th>
                                        <th scope="col">Clase</th>
                                        <th scope="col">Profesor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($resultados as $anotacion)
                                        <tr>
                                            <td>{{ $anotacion->RUN }}</td>
                                            <td>{{ $anotacion->Alumno }}</td>
                                            <td>{{ $anotacion->Tipo }}</td>
                                            <td>{{ $anotacion->Descripcion }}</td>
                                            <td>{{ $anotacion->FechaClase }}</td>
                                            <td>{{ $anotacion->ClaseDescripcion }}</td>
                                            <td>{{ $anotacion->Profesor }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
