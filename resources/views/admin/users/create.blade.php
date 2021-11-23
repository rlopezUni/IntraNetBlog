@extends('adminlte::page')

@section('title', 'Intranet Univer')

@section('content_header')
    <h1>Crear Post</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.users.store','autocomplete' => 'off','files' => true]) !!}

                <div class="form-group">
                    {!! Form::label('name','Nombre:')  !!}
                    {!! Form::text('name',null,['class' => 'form-control','placeholder' => 'Nombre '])  !!}

                    {!! Form::label('email','Email:')  !!}
                    {!! Form::email('email',null,['class' => 'form-control','placeholder' => 'correo '])  !!}
                    {!! Form::label('password','Contraseña:')  !!}
                    {!! Form::password('password',['class' => 'form-control'])  !!}

                </div>
                <h2 class="h5">Listado de roles</h2>

                @foreach ($roles as $role)
            <div>
                <label>
                    {!!  Form::checkbox('roles[]',$role->id,null,['class' => 'mr-1']) !!}
                    {{$role->name}}
                </label>
            </div>
                
            @endforeach
            
            

               {!! Form::submit('Crear Usuario',['class' => 'btn btn-primary'])  !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop