@extends('layouts.app')
@hasanyrole('administrador|profesor|apoderado')
@section('template_title')
    Reunion Apoderados
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Reunion Apoderados') }}
                            </span>
                            <div class="float-right">
                                <a href="{{ route('reunion-apoderados.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
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
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID</th>
                                        <th>Asistencia</th>
                                        <th>Inicio</th>
                                        <th>Fin</th>
                                        <th>Run Apoderado</th>
                                        <th>ID Reunión</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reunionApoderados as $reunionApoderado)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $reunionApoderado->IDReunionApoderado }}</td>
                                            <td>{{ $reunionApoderado->Asistencia }}</td>
                                            <td>{{ $reunionApoderado->HoraInicioReunionApoderado }}</td>
                                            <td>{{ $reunionApoderado->HoraFinReunionApoderado }}</td>
                                            <td>{{ $reunionApoderado->RunApoderado }}</td>
                                            <td>{{ $reunionApoderado->IDReunion }}</td>
                                            <td>
                                                <form action="{{ route('reunion-apoderados.destroy', $reunionApoderado->IDReunionApoderado) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('reunion-apoderados.show', $reunionApoderado->IDReunionApoderado) }}">
                                                        <i class="fa fa-fw fa-eye"></i> {{ __('Show') }}
                                                    </a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('reunion-apoderados.edit', $reunionApoderado->IDReunionApoderado) }}">
                                                        <i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="event.preventDefault(); confirm('¿Estás seguro de eliminar esta reunión?') ? this.closest('form').submit() : false;">
                                                        <i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $reunionApoderados->withQueryString()->links() !!}
            </div>
        </div>
    </div>
    @endhasanyrole
@endsection
