@extends('layouts.app')

@section('template_title')
    Registrosde Clases
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Registrosde Clases') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('registrosde-clases.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
									<th >Idregistrodeclase</th>
									<th >Idcursoasignatura</th>
									<th >Numeromatricula</th>
									<th >Idevaluacion</th>
									<th >Idasistencia</th>
									<th >Idanotacion</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($registrosdeClases as $registrosdeClase)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $registrosdeClase->IDRegistrodeClase }}</td>
										<td >{{ $registrosdeClase->IDCursoAsignatura }}</td>
										<td >{{ $registrosdeClase->NumeroMatricula }}</td>
										<td >{{ $registrosdeClase->IDEvaluacion }}</td>
										<td >{{ $registrosdeClase->IDAsistencia }}</td>
										<td >{{ $registrosdeClase->IDAnotacion }}</td>

                                            <td>
                                                <form action="{{ route('registrosde-clases.destroy', $registrosdeClase->IDRegistrodeClase) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('registrosde-clases.show', $registrosdeClase->IDRegistrodeClase) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('registrosde-clases.edit', $registrosdeClase->IDRegistrodeClase) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $registrosdeClases->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
