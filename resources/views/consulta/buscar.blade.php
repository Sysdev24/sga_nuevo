@extends('layouts.app2')


@section('css')
<!-- <link rel="stylesheet" href="{{ asset('css/kurmaStyle.css') }}"> -->
<style>
  .error{
    color: red
  }

  .abs-center {
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 10vh;
}
</style>
@endsection
<div class="fixed-top text-center hidden-banner" style="z-index: -99999">
    <div class="" style="background-color: #e0e0e0">
        <img width="350%" class="img-fluid" src="../../img/fondo_central.png">
    </div>
</div>

@section('content')


@if (session('status'))
<div class="alert alert-success desva">
    {{ session('status') }}
</div>
@endif

@if (session('error'))
<div class="alert alert-danger desva">
    {{ session('error') }}
</div>
@endif

<div class="jumbotron vertical-center" style="margin-top: 0px !important">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ url('/verificar') }}" method="GET" role="form" class="form" id="consulta" name="consulta">
          @csrf
          <div class="card card-outline card-primary">
            <div  class="card-header">
                <center><h3><b>  Consultar Estatus del Documento</b></h3></center>
          </div>
           <div class="card-body">
             <div  class="abs-center">
                <div class="form-group col-6">
                    <center><label for="nro_documento">N° de Documento:</label></center>
                    <input id="nro_documento" name="nro_documento" type="numeric" placeholder="Ingrese N° de Documento" class="form-control @error('nro_documento') is-invalid @enderror" name="nro_documento" value="{{ old('nro_documento') }}" required autocomplete="nro_documento" autofocus>
                    @if ($errors->has('nro_documento'))
                        <span class="text-danger">
                          <strong>{{ $errors->first('nro_documento') }}</strong>
                        </span>
                    @endif
                </div>
              </div>

              <hr>
              <div class="col-12">
               <center>
                <a href="{{ url('/login') }}" type="button" class="btn btn-outline-danger"><span class="fa fa-arrow-left"></span>  Atras</a>
                <a href="{{ url('/consulta') }}" type="button" class="btn btn-info"><span class="fas fa-sync-alt"></span>  Actualizar</a>
                <button type="submit" class="btn btn-outline-success">  <span class="fas fa-search"></span> Consultar</button>
            </center>
            </div>
              <br>
            </div>
          </div>
        </form>
        </div>
    </div>
  </div>
</div>

@endsection
