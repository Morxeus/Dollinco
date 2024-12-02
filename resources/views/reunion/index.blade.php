@extends('layouts.app')

@section('template_title')
    Reunions
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Reunions') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('reunions.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
									<th >Idreunion</th>
									<th >Tiporeunion</th>
									<th >Runprofesor</th>
									<th >Fecha</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reunions as $reunion)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $reunion->IDReunion }}</td>
										<td >{{ $reunion->TipoReunion }}</td>
										<td >{{ $reunion->RunProfesor }}</td>
										<td >{{ $reunion->Fecha }}</td>

                                            <td>
                                                <form action="{{ route('reunions.destroy', $reunion->IDReunion) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('reunions.show', $reunion->IDReunion) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    @hasanyrole('administrador|profesor')
                                                    <a class="btn btn-sm btn-success" href="{{ route('reunions.edit', $reunion->IDReunion) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                    @endhasanyrole
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $reunions->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
