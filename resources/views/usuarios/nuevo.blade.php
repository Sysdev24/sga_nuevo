@extends('adminlte::page')

@section('title', 'Registro Usuario')

@section('content_header')
    <b><h1 class="m-0 text-dark">Registrar Usuarios</h1></b>
@stop

@section('content')

<div class="card">
    <div class="card-header">
      <h3 class="card-title align-content-center">Agregar Usuario</h3>
      <div class="card-tools">
      </div>
      <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        <div class="row">
            <div class="col">
              <input type="text" class="form-control" name="name" id="name" placeholder="Nombre y Apellido" aria-label="Nombre y Apellido" required>
            </div>
            <div class="col">
              <input type="text" name="email" id="email" class="form-control" placeholder="Correo Electronico: usuario@corpoelec.gob.ve" aria-label="Correo Electronico" required>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col">
              <input type="text" class="form-control" name="cedula" id="cedula" placeholder="Cedula" aria-label="Cedula" required>
            </div>
            <div class="col">
              <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuario LDAP" aria-label="Usuario" required>
            </div>
          </div>
          <br><hr>
          <div class="row">
            <div class="col">
                <select class="form-control" id="role" name="role" required>
                    <option value="" selected>Seleccione un Rol de usuario</option>
                     @foreach ($roles as $role)
                        <option value="{{$role}}">{{$role}} </option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <select class="form-control" name="estatus" id="estatus" required>
                    <option value="" selected>Seleccione el Estatus del Usuario</option>
                    <option value="5" > Activo LDAP</option>
                    <option value="9" > Inactivo</option>
                  </select>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-6">
                <select class="form-control" id="gerencia_id" name="gerencia_id" required>
                    <option value="" selected>Seleccione una Gerencia</option>
                     @foreach ($gerencias as $gerencia)
                        <option value="{{$gerencia->id}}">{{$gerencia->descripcion}} </option>
                    @endforeach
                </select>
            </div>
          </div>
          <br><hr>
  <!-- /.card-body -->
    <div class="card-footer">
        <div class="row form-group">
            <div class="col-md-6 text-left">
              <a href="javascript:history.back()" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"></i> Atras </a>
           </div>
           <div class="col-md-1 text-right">
            <input type="submit" class="btn btn-primary btn-sm" value="Guardar">
         </div>
        </div>
        </form>
    </div>
    <!-- /.card-footer -->
  </div>
  <!-- /.card -->

@stop
