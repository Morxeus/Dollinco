@extends('layouts.app')

@section('template_title')
    Estado Matriculas
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Estado Matriculas') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('estado-matriculas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
									<th >Id matricula estado</th>
									<th >Estadomatricula</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($estadoMatriculas as $estadoMatricula)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $estadoMatricula->IDMatriculaEstado }}</td>
										<td >{{ $estadoMatricula->EstadoMatricula }}</td>

                                            <td>
                                                <form action="{{ route('estado-matriculas.destroy', $estadoMatricula->IDMatriculaEstado) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('estado-matriculas.show', $estadoMatricula->IDMatriculaEstado) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('estado-matriculas.edit', $estadoMatricula->IDMatriculaEstado) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $estadoMatriculas->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
