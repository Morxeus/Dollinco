@extends('layouts.app')

@section('template_title')
    Detalleregistroclases
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Detalleregistroclases') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('detalleregistroclases.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
									<th >Iddetalleregistroclase</th>
									<th >Notaevaluacion</th>
									<th >Idregistroclases</th>
									<th >Numeromatricula</th>
									<th >Idevaluacion</th>
									<th >Idanotacion</th>
									<th >Idasistencia</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($detalleregistroclases as $detalleregistroclase)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $detalleregistroclase->IdDetalleRegistroClase }}</td>
										<td >{{ $detalleregistroclase->NotaEvaluacion }}</td>
										<td >{{ $detalleregistroclase->IdRegistroClases }}</td>
										<td >{{ $detalleregistroclase->NumeroMatricula }}</td>
										<td >{{ $detalleregistroclase->IdEvaluacion }}</td>
										<td >{{ $detalleregistroclase->IdAnotacion }}</td>
										<td >{{ $detalleregistroclase->IdAsistencia }}</td>

                                            <td>
                                                <form action="{{ route('detalleregistroclases.destroy', $detalleregistroclase->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('detalleregistroclases.show', $detalleregistroclase->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('detalleregistroclases.edit', $detalleregistroclase->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $detalleregistroclases->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
