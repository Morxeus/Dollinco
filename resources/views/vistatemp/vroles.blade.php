@extends('layouts.app')

@section('template_title')
    Gestión de Roles
@endsection

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow-sm rounded">
                    <div class="card-header bg-primary text-white">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title" class="h4">
                                {{ __('Gestión de Roles') }}
                            </span>
                        </div>
                    </div>

                    <div class="card-body bg-light">
                        <!-- Formulario para agregar nuevos roles -->
                        <div class="mb-4">
                            <h5>Crear Nuevo Rol</h5>
                            <form>
                                <div class="form-group">
                                    <label for="nombre_rol">Nombre del Rol</label>
                                    <input type="text" id="nombre_rol" class="form-control" placeholder="Ingrese el nombre del rol">
                                </div>
                                <button type="button" class="btn btn-success mt-2">Guardar</button>
                            </form>
                        </div>

                        <!-- Tabla para mostrar los roles -->
                        <div class="table-responsive">
                            <h5>Roles Existentes</h5>
                            <table class="table table-hover table-striped table-bordered rounded-lg">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Nombre del Rol</th>
                                        <th>Fecha de Creación</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Rol 1 -->
                                    <tr>
                                        <td>1</td>
                                        <td>Administrador</td>
                                        <td>2024-01-01</td>
                                        <td>
                                            <button class="btn btn-sm btn-warning">Editar</button>
                                            <button class="btn btn-sm btn-danger">Eliminar</button>
                                        </td>
                                    </tr>

                                    <!-- Rol 2 -->
                                    <tr>
                                        <td>2</td>
                                        <td>Profesor</td>
                                        <td>2024-01-02</td>
                                        <td>
                                            <button class="btn btn-sm btn-warning">Editar</button>
                                            <button class="btn btn-sm btn-danger">Eliminar</button>
                                        </td>
                                    </tr>

                                    <!-- Rol 3 -->
                                    <tr>
                                        <td>3</td>
                                        <td>Apoderado</td>
                                        <td>2024-01-03</td>
                                        <td>
                                            <button class="btn btn-sm btn-warning">Editar</button>
                                            <button class="btn btn-sm btn-danger">Eliminar</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center mt-3">
                    <!-- Paginación en caso de tener muchos roles -->
                    {{-- {!! $roles->withQueryString()->links() !!} --}}
                </div>
            </div>
        </div>
    </div>
@endsection
