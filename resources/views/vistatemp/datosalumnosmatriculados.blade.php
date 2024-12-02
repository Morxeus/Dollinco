@extends('layouts.app')

@section('template_title')
    Mantenedor de Alumnos Matriculados y Apoderados
@endsection

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow-sm rounded">
                    <div class="card-header bg-primary text-white">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title" class="h4">
                                {{ __('Alumnos Matriculados y Apoderados - 2024') }}
                            </span>
                            <a href="{{ route('alumnos.create') }}" class="btn btn-light btn-sm float-right">
                                {{ __('Crear Nuevo Alumno') }}
                            </a>
                        </div>
                    </div>

                    <div class="card-body bg-light">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered rounded-lg">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Run Alumno</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Curso</th>
                                        <th>Apoderado</th>
                                        <th>Contacto Apoderado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Alumno 1 -->
                                    <tr>
                                        <td>1</td>
                                        <td>20.123.456-7</td>
                                        <td>Pedro</td>
                                        <td>Pérez González</td>
                                        <td>3° Básico A</td>
                                        <td>Juan Pérez</td>
                                        <td>+569 1234 5678</td>
                                        <td>
                                            <a href="{{ route('alumnos.show', '20.123.456-7') }}" class="btn btn-sm btn-primary">
                                                <i class="fa fa-fw fa-eye"></i> Ver
                                            </a>
                                            <a href="{{ route('alumnos.edit', '20.123.456-7') }}" class="btn btn-sm btn-success">
                                                <i class="fa fa-fw fa-edit"></i> Editar
                                            </a>
                                            <form action="{{ route('alumnos.destroy', '20.123.456-7') }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este alumno?');">
                                                    <i class="fa fa-fw fa-trash"></i> Eliminar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                    <!-- Alumno 2 -->
                                    <tr>
                                        <td>2</td>
                                        <td>19.987.654-3</td>
                                        <td>María</td>
                                        <td>Ramírez Soto</td>
                                        <td>3° Básico A</td>
                                        <td>Rosa Soto</td>
                                        <td>+569 9876 5432</td>
                                        <td>
                                            <a href="{{ route('alumnos.show', '19.987.654-3') }}" class="btn btn-sm btn-primary">
                                                <i class="fa fa-fw fa-eye"></i> Ver
                                            </a>
                                            <a href="{{ route('alumnos.edit', '19.987.654-3') }}" class="btn btn-sm btn-success">
                                                <i class="fa fa-fw fa-edit"></i> Editar
                                            </a>
                                            <form action="{{ route('alumnos.destroy', '19.987.654-3') }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este alumno?');">
                                                    <i class="fa fa-fw fa-trash"></i> Eliminar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                    <!-- Alumno 3 -->
                                    <tr>
                                        <td>3</td>
                                        <td>21.654.321-8</td>
                                        <td>Carlos</td>
                                        <td>Figueroa López</td>
                                        <td>3° Básico A</td>
                                        <td>Alberto Figueroa</td>
                                        <td>+569 2345 6789</td>
                                        <td>
                                            <a href="{{ route('alumnos.show', '21.654.321-8') }}" class="btn btn-sm btn-primary">
                                                <i class="fa fa-fw fa-eye"></i> Ver
                                            </a>
                                            <a href="{{ route('alumnos.edit', '21.654.321-8') }}" class="btn btn-sm btn-success">
                                                <i class="fa fa-fw fa-edit"></i> Editar
                                            </a>
                                            <form action="{{ route('alumnos.destroy', '21.654.321-8') }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este alumno?');">
                                                    <i class="fa fa-fw fa-trash"></i> Eliminar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                    <!-- Alumno 4 -->
                                    <tr>
                                        <td>4</td>
                                        <td>20.321.789-2</td>
                                        <td>Ana</td>
                                        <td>Fernández Castillo</td>
                                        <td>3° Básico A</td>
                                        <td>Carmen Castillo</td>
                                        <td>+569 3456 7890</td>
                                        <td>
                                            <a href="{{ route('alumnos.show', '20.321.789-2') }}" class="btn btn-sm btn-primary">
                                                <i class="fa fa-fw fa-eye"></i> Ver
                                            </a>
                                            <a href="{{ route('alumnos.edit', '20.321.789-2') }}" class="btn btn-sm btn-success">
                                                <i class="fa fa-fw fa-edit"></i> Editar
                                            </a>
                                            <form action="{{ route('alumnos.destroy', '20.321.789-2') }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este alumno?');">
                                                    <i class="fa fa-fw fa-trash"></i> Eliminar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                    <!-- Alumno 5 -->
                                    <tr>
                                        <td>5</td>
                                        <td>22.654.987-1</td>
                                        <td>Jorge</td>
                                        <td>Muñoz Herrera</td>
                                        <td>3° Básico A</td>
                                        <td>Ignacio Muñoz</td>
                                        <td>+569 4567 8901</td>
                                        <td>
                                            <a href="{{ route('alumnos.show', '22.654.987-1') }}" class="btn btn-sm btn-primary">
                                                <i class="fa fa-fw fa-eye"></i> Ver
                                            </a>
                                            <a href="{{ route('alumnos.edit', '22.654.987-1') }}" class="btn btn-sm btn-success">
                                                <i class="fa fa-fw fa-edit"></i> Editar
                                            </a>
                                            <form action="{{ route('alumnos.destroy', '22.654.987-1') }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este alumno?');">
                                                    <i class="fa fa-fw fa-trash"></i> Eliminar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                    <!-- Alumno 6 -->
                                    <tr>
                                        <td>6</td>
                                        <td>23.123.654-5</td>
                                        <td>Paula</td>
                                        <td>Martínez Silva</td>
                                        <td>3° Básico A</td>
                                        <td>Sofía Silva</td>
                                        <td>+569 5678 9012</td>
                                        <td>
                                            <a href="{{ route('alumnos.show', '23.123.654-5') }}" class="btn btn-sm btn-primary">
                                                <i class="fa fa-fw fa-eye"></i> Ver
                                            </a>
                                            <a href="{{ route('alumnos.edit', '23.123.654-5') }}" class="btn btn-sm btn-success">
                                                <i class="fa fa-fw fa-edit"></i> Editar
                                            </a>
                                            <form action="{{ route('alumnos.destroy', '23.123.654-5') }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este alumno?');">
                                                    <i class="fa fa-fw fa-trash"></i> Eliminar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <!-- Paginación en caso de tener muchos registros -->
                    {{-- {!! $alumnos->withQueryString()->links() !!} --}}
                </div>
            </div>
        </div>
    </div>
@endsection
