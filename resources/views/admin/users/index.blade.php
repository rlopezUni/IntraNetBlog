@extends('adminlte::page')

@section('title', 'Intranet Univer')

@section('content_header')
<a href="{{route('admin.users.create')}}" class="btn btn-secondary btn-sm float-right">Nuevo Usuario</a>
    <h1>Lista de usuarios</h1>
@stop

@section('content')
    @livewire('admin.users-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop