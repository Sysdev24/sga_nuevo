@extends('layouts.app2')


@section('css')
<!-- <link rel="stylesheet" href="{{ asset('css/kurmaStyle.css') }}"> -->
<style>
  .error{
    color: red
  }
</style>
@endsection
<div class="fixed-top text-center hidden-banner" style="z-index: -99999">
    <div class="" style="background-color: #e0e0e0">
        <img width="350%" class="img-fluid" src="../../img/background.jpg">
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


<!-- <div class="fixed-top text-center" style="z-index: -99999">
  {{-- <div class="" style="background-color: #2677d2">
    <img class="img-fluid" src="../../img/gobierno_banner.png"> <br>
  </div> --}}
  <div class="" style="background-color: #255b99">
    <img class="img-fluid" src="../../img/banner_saren.png">
  </div>
</div> -->

<div class="jumbotron vertical-center" style="margin-top: 0px !important">
  <div class="container">
    <div class="row">

      <div class="col-md-12">

        <form action="{{ url('/recupera') }}" method="POST" role="form" class="form" id="recupera_form" name="recupera_form">
          @csrf

          <div class="card card-outline card-primary">
            <div  class="card-header">

                <center><h3><b>  Recuperar Contraseña</b></h3></center>
          </div>

            <div class="card-body">

             <div  class="row">
                <div class="form-group col-6">

                    <label for="cedula">Cédula:</label>
                    <input id="cedula" name="cedula" type="numeric" placeholder="Ingrese Cedula" class="form-control @error('cedula') is-invalid @enderror" name="cedula" value="{{ old('cedula') }}" required autocomplete="cedula" autofocus>
                    @if ($errors->has('cedula'))
                        <span class="text-danger">
                          <strong>{{ $errors->first('cedula') }}</strong>
                        </span>
                    @endif

                </div>
              </div>
              <hr>
              <div class="row justify-content-center" id="fallo" name="fallo">
                 <!-- <h3 class="card-title"><b>Sus datos no coinciden con nuestros registros.</b></h3> -->
              </div>
              <br>

              <div class="row justify-content-center" id="ingresarClave" name="ingresarClave">
                <div class="card card-primary card-outline">
                <div  class="card-header">

                        <center><h5><b>  Ingrese su nueva contraseña.</b></h5></center>

                  </div>
                      <div class="card-body">
                        <div class="row">
                          <div class="form-group col-6">
                              <label for="">Contraseña:</label>
                              <div class="input-group">
                                <input type="password" class="form-control" name="password" id="password" value="{{--  --}}" />
                                <span class="input-group-text">
                                  <i class="fa fa-exclamation-circle" style="color:red;" data-placement="right"
                                    data-toggle="popover" title="Nueva contraseña"
                                    data-content="Su contraseña debe tener entre 4 y 10 caracteres y contener al menos una letra mayúscula, al menos una letra minúscula,
                                    al menos un valor numérico y al menos un caracter especial, P.E.: #?!@$%^&*-_.">
                                  </i>
                                </span>
                              </div>
                              @if ($errors->has('password'))
                                  <span class="text-danger">
                                    <strong>{{ $errors->first('password') }}</strong>
                                  </span>
                              @endif
                          </div>
                          <div class="form-group col-6">
                              <label for="">Confirmar Contraseña:</label>
                              <div class="input-group">
                                  <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" value="{{--  --}}" />
                                  <div class="input-group-append">
                                    <span class="input-group-text">
                                      <i class="fa fa-exclamation-circle" style="color:red;" data-placement="right"
                                        data-toggle="popover" title="Confirmar contraseña"
                                        data-content="Repita su contraseña para confirmarla.">
                                      </i>
                                    </span>
                                 </div>
                                 @if ($errors->has('password_confirmation'))
                                     <span class="text-danger">
                                       <strong>{{ $errors->first('password_confirmation') }}</strong>
                                     </span>
                                 @endif
                              </div>
                           </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12 text-right">
                                <button type="submit" class="btn btn-outline-success">Aceptar</button>
                                <a href="{{ url('/login') }}" type="button" class="btn btn-outline-danger">Cancelar</a>
                            </div>
                        </div>
                      </div>
                  </div>
              </div>

            </div>

          <!--  <div class="card-footer">
              <div class="row justify-content-center" id="botonesValidar" name="botonesValidar">
                  <div class="col-4">
                      <a href="{{-- url('login') --}}" class="btn btn-primary btn-block">Volver atrás</a>
                  </div>
                  <div class="col-4">
                    <button type="button" onClick="verificaPreguntas();" class="btn btn-primary btn-block">Aceptar</button>
                  </div>
              </div>
            </div> -->

          </div>

        </form>

      </div>

    </div>
  </div>
</div>

@endsection
