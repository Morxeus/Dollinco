@extends('layouts.app')

@section('template_title')
    {{ $registroclase->name ?? __('Mostrar Registro de Clase') }}
@endsection

@section('content')
<section class="content container-fluid d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="row justify-content-center">
        <div class="col-auto">
            <div class="card shadow rounded">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex flex-column align-items-center">
                        <h5 class="mb-3">Información del Registro de Clase</h5>
                        <a class="btn btn-sm btn-secondary" href="{{ route('registroclases.index') }}">
                            <i class="fas fa-arrow-left"></i> Volver
                        </a>
                    </div>
                </div>
                <div class="card-body bg-light">
                    <table class="table table-bordered" style="background-color: #f7f7f7; color: #000;">
                        <tbody>
                            <tr>
                                <th scope="row" class="text-end">ID del Registro de Clases:</th>
                                <td>{{ $registroclase->IdRegistroClases }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-end">ID de la Malla:</th>
                                <td>{{ $registroclase->IdMalla }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-end">Fecha de la Clase:</th>
                                <td>{{ $registroclase->FechaClase }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-end">Descripción de la Clase:</th>
                                <td>{{ $registroclase->DescripcionClase }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
