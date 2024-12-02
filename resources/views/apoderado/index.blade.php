@extends('layouts.app')
@hasanyrole('administrador|profesor|apoderado')
@section('template_title')
    Apoderados
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <div class="d-flex justify-content-between align-items-center">
                            <span id="card_title">{{ __('Apoderados') }}</span>
                            @hasanyrole('administrador|profesor')
                            <a href="{{ route('apoderados.create') }}" class="btn btn-primary btn-sm float-right">
                                {{ __('Crear Nuevo') }}
                            </a>
                            @endhasanyrole
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>#</th>
                                        <th>Run Apoderado</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Correo</th>
                                        <th>Teléfono</th>
                                        <th>Usuario Asignado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($apoderados as $index => $apoderado)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $apoderado->RunApoderado }}</td>
                                            <td>{{ $apoderado->Nombres }}</td>
                                            <td>{{ $apoderado->Apellidos }}</td>
                                            <td>{{ $apoderado->Correo }}</td>
                                            <td>{{ $apoderado->Telefono }}</td>
                                            <td>
                                                @if ($apoderado->user_id)
                                                    <span class="badge bg-success">Asignado</span>
                                                @else
                                                    <span class="badge bg-danger">No Asignado</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-primary" href="{{ route('apoderados.show', $apoderado->RunApoderado) }}">
                                                    <i class="fa fa-fw fa-eye"></i> Ver
                                                </a>
                                                @hasanyrole('administrador|profesor')
                                                <a class="btn btn-sm btn-success" href="{{ route('apoderados.edit', $apoderado->RunApoderado) }}">
                                                    <i class="fa fa-fw fa-edit"></i> Editar
                                                </a>
                                                @endhasanyrole
                                                @if (!$apoderado->user_id)
                                                    <form action="{{ route('apoderados.asignarUsuario', $apoderado->RunApoderado) }}" method="POST" style="display:inline">
                                                        @csrf
                                                        <button class="btn btn-sm btn-warning">
                                                            <i class="fa fa-fw fa-user"></i> Asignar Usuario
                                                        </button>
                                                    </form>
                                                @endif
                                                @role('administrador')
                                                <form action="{{ route('apoderados.destroy', $apoderado->RunApoderado) }}" method="POST" style="display:inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este apoderado?')">
                                                        <i class="fa fa-fw fa-trash"></i> Eliminar
                                                    </button>
                                                </form>
                                                @endrole
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {!! $apoderados->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endhasanyrole
@endsection
