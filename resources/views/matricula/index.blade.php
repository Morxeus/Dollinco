@extends('layouts.app')
@hasanyrole('administrador|profesor|apoderado')
@section('template_title')
    Matriculas
@endsection

@section('content')
    <div class="container-fluid d-none d-md-block">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Matriculas') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('matriculas.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive" style="overflow-x: auto;">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Número Matricula</th>
                                        <th>Run alumno</th>
                                        <th>Run apoderado</th>
                                        <th>Fecha inscripción</th>
                                        <th>Estado Matrícula</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($matriculas as $matricula)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $matricula->NumeroMatricula }}</td>
                                            <td>{{ $matricula->RunAlumno }}</td>
                                            <td>{{ $matricula->RunApoderado }}</td>
                                            <td>{{ $matricula->FechaInscripcion }}</td>
                                            <td>{{ $matricula->EstadoMatricula->EstadoMatricula }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <button id="actionDropdown" type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        {{ __('Acciones') }}
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="actionDropdown">
                                                        <a class="dropdown-item text-primary" href="{{ route('matriculas.show', $matricula->NumeroMatricula) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                        @hasanyrole('administrador|profesor')
                                                        <a class="dropdown-item text-success" href="{{ route('matriculas.edit', $matricula->NumeroMatricula) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                        @endhasanyrole
                                                        @role('administrador')
                                                        <form action="{{ route('matriculas.destroy', $matricula->NumeroMatricula) }}" method="POST" style="display:inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                        </form>
                                                        @endrole
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $matriculas->withQueryString()->links() !!}
            </div>
        </div>
    </div>

    <!-- Message for small screens -->
    <div class="container d-block d-md-none text-center mt-5">
        <p class="alert alert-warning">Esta vista solo está disponible en pantallas de 1080px o más.</p>
    </div>
    @endhasanyrole
@endsection
