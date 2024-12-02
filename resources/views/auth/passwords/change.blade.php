@extends('adminlte::page')

@section('title', 'Cambiar Contraseña')

@section('content_header')
    <h1 class="text-center"></h1>
@stop

@section('content')
    <div class="container" style="max-width: 1080px; margin: 0 auto;">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Formulario de Cambio de Contraseña</h5>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form method="POST" action="{{ route('password.change') }}">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', Auth::user()->email) }}" readonly>
                        @error('email')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="current_password" class="form-label">Contraseña Actual</label>
                        <input type="password" name="current_password" id="current_password" class="form-control" placeholder="Ingresa tu contraseña actual">
                        @error('current_password')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="new_password" class="form-label">Nueva Contraseña</label>
                        <input type="password" name="new_password" id="new_password" class="form-control" placeholder="Ingresa una nueva contraseña">
                        @error('new_password')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="new_password_confirmation" class="form-label">Confirmar Nueva Contraseña</label>
                        <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" placeholder="Confirma tu nueva contraseña">
                        @error('new_password_confirmation')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success px-5">
                            <i class="fas fa-save"></i> Cambiar Contraseña
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
