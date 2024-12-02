@extends('layouts.app')
@hasanyrole('administrador|profesor')
@section('template_title')
    Profesor Clases
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Profesor Clases') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('profesor-clases.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
									<th >Idprofesorclase</th>
									<th >Idregistrodeclase</th>
									<th >Runprofesor</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($profesorClases as $profesorClase)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $profesorClase->IDProfesorClase }}</td>
										<td >{{ $profesorClase->IDRegistrodeClase }}</td>
										<td >{{ $profesorClase->RunProfesor }}</td>

                                            <td>
                                                <form action="{{ route('profesor-clases.destroy', $profesorClase->IDProfesorClase) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('profesor-clases.show', $profesorClase->IDProfesorClase) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('profesor-clases.edit', $profesorClase->IDProfesorClase) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    @role('administador')
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
                {!! $profesorClases->withQueryString()->links() !!}
            </div>
        </div>
    </div>
    @endhasanyrole
@endsection
