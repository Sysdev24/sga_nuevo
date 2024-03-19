@extends('adminlte::page')

@section('title', 'Usuario')

@section('content_header')
    <b><h1 class="m-0 text-dark">Registrar Usuarios</h1></b>
@stop

@section('content')
<div class="row form-group">

	<div class="col-md-6">
		<label for="descripcion">Nombre y apellido</label>
		<input type="text" class="form-control" name="name" id="name" value="{{ isset($user->name)?$user->name:'' }}" required />
	</div>
	<br><br>
	<div class="col-md-6">
		<label for="descripcion">Email</label>
		<input type="email" class="form-control" name="email" id="email" value="{{ isset($user->email)?$user->email:'' }}" required />
	</div>
	<br><br>
	<div class="col-md-6">
		<label for="descripcion">clave</label>
		<input type="password" class="form-control" name="password" id="password" value="{{ isset($user->password)?$user->password:'' }}" required />
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

@stop