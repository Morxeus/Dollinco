@extends('layouts.app')

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

                            <span id="card_title">
                                {{ __('Mallas') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('mallas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
									<th >Idmalla</th>
									<th >Nombremalla</th>
									<th >Idcurso</th>
									<th >Idasignatura</th>
									<th >Numeromatricula</th>
									<th >Runprofesor</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mallas as $malla)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $malla->IdMalla }}</td>
										<td >{{ $malla->NombreMalla }}</td>
										<td >{{ $malla->IdCurso }}</td>
										<td >{{ $malla->IdAsignatura }}</td>
										<td >{{ $malla->NumeroMatricula }}</td>
										<td >{{ $malla->RunProfesor }}</td>

                                            <td>
                                                <form action="{{ route('mallas.destroy', $malla->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('mallas.show', $malla->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('mallas.edit', $malla->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $mallas->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
