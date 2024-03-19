@extends('adminlte::auth.auth-page', ['auth_type' => 'login'])

@section('adminlte_css_pre')
    <link rel="stylesheet" href="{{ asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@stop

@php( $login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login') )
@php( $register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register') )
@php( $password_reset_url = View::getSection('password_reset_url') ?? config('adminlte.password_reset_url', 'password/reset') )

@if (config('adminlte.use_route_url', false))
    @php( $login_url = $login_url ? route($login_url) : '' )
    @php( $register_url = $register_url ? route($register_url) : '' )
    @php( $password_reset_url = $password_reset_url ? route($password_reset_url) : '' )
@else
    @php( $login_url = $login_url ? url($login_url) : '' )
    @php( $register_url = $register_url ? url($register_url) : '' )
    @php( $password_reset_url = $password_reset_url ? url($password_reset_url) : '' )
@endif

<style>

#nr_topStrip {
        /* background: #2577D2; */
        font-family: 'Open Sans', sans-serif;
        font-size: 300%;
        padding: 1px 0;
        height: 15%;
    }
    #nr_topStrip2 {
        background: #10519b;

        font-family: 'Open Sans', sans-serif;
        font-size: 5px;
        padding: 7px 0;
        height:15%;
    }
    </style>

@section('auth_header', __('Inicio de Sesión'))
<div class="fixed-top text-left hidden-banner" style="z-index: -99999">
    <!-- <div class=""  style="background-color: #255b99">
    <img width="200%" class="img-fluid" src="../../img/banner_sigestra.png">
  </div> -->
  <section id="nr_topStrip" class="row">
      <div class="container">
        <div class="row">

            <img src="{{ asset('images/banner_superior.jpg') }}" style="max-width:100%;height:500%;">

        </div>
      </div>
    </section>


  <div class="" style="background-color: #e0e0e0">
    <img width="350%" class="img-fluid" src="../../img/fondo_central.png">
  </div>
</div>
<br>

@section('auth_body')
@if (session('success'))
<div class="alert alert-success desva">
    {{ session('success') }}
</div>
@endif

@if (session('errors'))
<div class="alert alert-danger desva">
  <center><h5><b>{{ session('errors
  ') }} </b></h5></center>
</div>
@endif
    <form action="{{ $login_url }}" method="post">
        @csrf

        {{-- usuario field --}}
        <div class="input-group mb-3">
            <input type="usuario" name="usuario" class="form-control @error('usuario') is-invalid @enderror"
                   value="{{ old('usuario') }}" placeholder="Usuario" autofocus>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>

            @error('usuario')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Password field --}}
        <div class="input-group mb-3">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                   placeholder="Contraseña">

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Login field --}}
        <div class="row">
            <div class="col-7">
                <div class="icheck-primary" title="{{ __('adminlte::adminlte.remember_me_hint') }}">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label for="remember">
                        Recordar
                    </label>
                </div>
            </div>

            <div class="col-5">
                <button type=submit class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
                    <span class="fas fa-sign-in-alt"></span>
                    Ingresar
                </button>
            </div>
        </div>

    </form>
@stop

@section('auth_footer')
   {{-- Recuperacion de Contraseña --}}
      @if($password_reset_url)
        <p class="my-0">
            <a href="{{ url('recupera') }}" class="text-left"> ¿Olvido su contraseña?</a>
        </p>
    @endif

    {{-- Register link --}}

        <p class="my-0">
            <a href="{{ url('consulta') }}">
               Consultar Estatus del Documento
            </a>
        </p>




@stop
