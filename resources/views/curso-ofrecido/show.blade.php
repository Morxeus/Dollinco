@extends('layouts.app')

@section('template_title')
    {{ $cursoOfrecido->name ?? __('Mostrar Curso Ofrecido') }}
@endsection

@section('content')
<section class="content container-fluid d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="row justify-content-center">
        <div class="col-auto">
            <div class="card shadow rounded">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex flex-column align-items-center">
                        <h5 class="mb-3">Información del Curso Ofrecido</h5>
                        <a class="btn btn-sm btn-secondary" href="{{ route('curso-ofrecidos.index') }}">
                            <i class="fas fa-arrow-left"></i> Volver
                        </a>
                    </div>
                </div>
                <div class="card-body bg-light">
                    <table class="table table-bordered" style="background-color: #f7f7f7; color: #000;">
                        <tbody>
                            <tr>
                                <th scope="row" class="text-end">ID del Curso Ofrecido:</th>
                                <td>{{ $cursoOfrecido->IDCursoOfrecido }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-end">Año:</th>
                                <td>{{ $cursoOfrecido->Año }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-end">ID del Curso:</th>
                                <td>{{ $cursoOfrecido->IDCurso }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-end">Letra:</th>
                                <td>{{ $cursoOfrecido->Letra }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-end">Cupos:</th>
                                <td>{{ $cursoOfrecido->Cupos }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-end">ID del Periodo:</th>
                                <td>{{ $cursoOfrecido->IDPeriodo }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
