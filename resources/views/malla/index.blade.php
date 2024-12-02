@extends('layouts.app')
@hasanyrole('administrador|profesor|apoderado')
@section('template_title')
    Mallas
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">{{ __('Mallas') }}</span>
                           @hasanyrole('administrador|profesor')
                            <div class="float-right">
                                <a href="{{ route('mallas.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                    {{ __('Create New') }}
                                </a>
                            </div>
                            @endhasanyrole
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        <!-- Formulario de Búsqueda -->
                        <form action="{{ route('mallas.index') }}" method="GET" class="mb-4">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="text" name="numero_matricula" class="form-control" placeholder="Buscar por Número de Matrícula" value="{{ request('numero_matricula') }}">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="curso" class="form-control" placeholder="Buscar por Curso" value="{{ request('curso') }}">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="asignatura" class="form-control" placeholder="Buscar por Asignatura" value="{{ request('asignatura') }}">
                                </div>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Buscar</button>
                                <a href="{{ route('mallas.index') }}" class="btn btn-secondary">Limpiar</a>
                            </div>
                        </form>

                        <!-- Tabla de Resultados -->
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Curso</th>
                                        <th>Asignatura</th>
                                        <th>Número Matrícula</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mallas as $malla)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $malla->curso->NombreCurso ?? 'N/A' }}</td>
                                            <td>{{ $malla->asignatura->NombreAsignatura ?? 'N/A' }}</td>
                                            <td>{{ $malla->NumeroMatricula }}</td>
                                            <td>
                                                <form action="{{ route('mallas.destroy', $malla->IDCursoAsignatura) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('mallas.show', $malla->IDCursoAsignatura) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    @hasanyrole('administrador|profesor')
                                                    <a class="btn btn-sm btn-success" href="{{ route('mallas.edit', $malla->IDCursoAsignatura) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @endhasanyrole
                                                    @csrf
                                                    @method('DELETE')
                                                    @role('administrador')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                    @endrole
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $mallas->withQueryString()->links() !!}
            </div>
        </div>
    </div>
    @endhasanyrole
@endsection
