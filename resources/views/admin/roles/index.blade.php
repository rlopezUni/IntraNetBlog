@extends('adminlte::page')

@section('title', 'Intranet Univer')

@section('content_header')
<a href="{{route('admin.roles.create')}}" class="btn btn-secondary btn-sm float-right">Nuevo Rol</a>
    <h1>Listado de roles</h1>
@stop

@section('content')
@if (session('info'))
<div class="alert alert-success">
    <strong>{{session('info')}}</strong>
</div>

@endif
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Role</th>
                        <th colspan="2"></th>
                    </tr>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{$role->id}}</td>
                                <td>{{$role->name}}</td>
                                <td width=10px>
                                    <a class="btn btn-sm btn-primary" href="{{route('admin.roles.edit',$role)}}">Editar</a>
                                </td>
                                <td width=10px>
                                    <form action="{{route('admin.roles.destroy',$role)}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </thead>
            </table>
        </div>
    </div>
@stop

