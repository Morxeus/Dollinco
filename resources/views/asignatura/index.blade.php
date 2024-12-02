@extends('layouts.app')

@section('template_title')
    Asignaturas
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Lista de Asignaturas') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('asignaturas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nuevo') }}
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
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
									<th >Id Asignatura</th>
									<th >Nombre Asignatura</th>
                                    <th >Acciones</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($asignaturas as $asignatura)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $asignatura->IDAsignatura }}</td>
										<td >{{ $asignatura->NombreAsignatura }}</td>

                                            <td>
                                                <form action="{{ route('asignaturas.destroy', $asignatura->IDAsignatura) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('asignaturas.show', $asignatura->IDAsignatura) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('asignaturas.edit', $asignatura->IDAsignatura) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $asignaturas->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
