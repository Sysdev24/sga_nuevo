@extends('adminlte::page')

@section('title', 'Usuario')

@section('content_header')
    <b><h1 class="m-0 text-dark">Usuarios</h1></b>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
		<div class="row">
                        <div id="error">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        </div>
                        </div>

                <div class="card-header"><h2>Editar</h2></div>

                <div class="card-body">

<form action="{{ url('usuarios/'.$usuario->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
@method('PATCH')

<div class="row form-group">

        <div class="col-md-6">
                <label for="descripcion">Nombre y apellido</label>
                {{ isset($usuario->name)?$usuario->name:'' }}
        </div>
        <br><br>
        <div class="col-md-6">
                <label for="descripcion">Email</label>
                {{ isset($usuario->email)?$usuario->email:'' }}
        </div>
        <br><br>
        <div class="col-md-6">
                <label for="descripcion">clave (Sino va a cambiar clave dejar vacio)</label>
                <input type="password" class="form-control" name="password" id="password" value=""  />
        </div>
        <div class="col-md-6">
                <label for="descripcion">Roles ({{ $usuario->getRoleNames()}})</label>
                <select class="form-control" id="role" name="role" required>
            <option value="" selected>Seleccione una opción</option>
             @foreach ($roles as $role)
                <option value="{{$role}}">{{$role}} </option>
            @endforeach
        </select>
        </div>
</div>
<div class="row form-group">
        <div class="col-md-6 text-left">
          <a href="javascript:history.back()" class="btn btn-default btn-sm"><i class="fa fa-arrow-left"></i> Atras </a>
   </div>
   <div class="col-md-1 text-right">
        <input type="submit" class="btn btn-primary btn-sm" value="Guardar">
 </div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
@stop
