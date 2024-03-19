@extends('adminlte::page')

@section('title', 'INICIO')


@section('content_header')
    <br><center><h1 class="m-0 text-dark"><b>BIENVENID@ {{ Auth::user()->name }} - AL SISTEMA DE GESTIÓN DE CARGA DE ARCHIVOS - ATIT</b></h1></center><br>
    <h2 class="text-success"><p class="my-0"><center><b>(SIGESCA - ATIT)</b></center></p></h2><br>
    <center><img src="vendor/adminlte/dist/img/logo2.png" width="400" height="1000" class="img-fluid"></center><br>
@stop


@section('content')
<div class="small-box bg-gradient-success">
    <div class="inner">
      <h3>44</h3>
      <p>User Registrations</p>
    </div>
    <div class="icon">
      <i class="fas fa-user-plus"></i>
    </div>
    <a href="#" class="small-box-footer">
      More info <i class="fas fa-arrow-circle-right"></i>
    </a>
  </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body bg-card">
                    <p class="m-0 text-dark"><center><br><b>LEY ORGÁNICA DEL SISTEMA Y SERVICIO ELECTRICO</center></p>
                    <p class="my-0">Artículo 108: Cualquiera que indebidamente y con perjuicio para la República,
                    haya revelado secretos concernientes a la seguridad del Sistema Eléctrico Nacional,
                    bien sea comunicando o publicando los documentos u otras informaciones concernientes al sistema,
                    será castigado con prisión de ocho a dieciseis años.</p>
                </div>
                <br>
            </div>
            <center><img src="vendor/adminlte/dist/img/conciencia_verde.png" width="600" height="1000" class="img-fluid"></center><br>
        </div>
    </div>

@stop

