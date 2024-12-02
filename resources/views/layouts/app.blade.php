@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div></div>
@stop

@section('content')
    <p>Aqui iria la pagína principal de la aplicación</p>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop