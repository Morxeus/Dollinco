@extends('layouts.app')

@section('template_title')
    Anotacions
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Lista de Anotaciones') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('anotacions.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nueva') }}
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
                                        
									<th >Id Anotación</th>
									<th >Tipo de Anotación</th>
									<th >Fecha</th>
									<th >Descripción</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($anotacions as $anotacion)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $anotacion->IDAnotacion }}</td>
										<td >{{ $anotacion->TipoAnotacion }}</td>
										<td >{{ $anotacion->Fecha }}</td>
										<td >{{ $anotacion->Descripcion }}</td>

                                            <td>
                                                <form action="{{ route('anotacions.destroy', $anotacion->IDAnotacion) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('anotacions.show', $anotacion->IDAnotacion) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('anotacions.edit', $anotacion->IDAnotacion) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
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
                {!! $anotacions->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
