@extends('adminlte::page')

@section('title', 'Crear División')

@section('content_header')
    <b><h1 class="m-0 text-dark">Crear División</h1></b>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
		  <form action="/area_trabajo/guardar" method="POST">
		   @csrf
		   <div class="row form-group">
			<div class="col-md-1.1">
				<label for="descripcion">Gerencia General</label>
			</div>

			<div class="col-md-6">
				<select class="form-control" id="gergral_id" name="gergral_id" required>
					<option value="" selected>Seleccione una opción</option>
					@foreach ($gergral as $g)
					<option value="{{$g->id}}">{{$g->descripcion}} </option>
					@endforeach
				</select>
			</div>
		</div>
			<div class="row form-group">
				<div class="col-md-1.1">
					<label for="descripcion">Descripcion</label>
				</div>

				<div class="col-md-6">
					<input type="text" class="form-control" name="descripcion" id="descripcion" value="{{ isset($AreaTrabajo->descripcion)?$areaTrabajo->descripcion:'' }}" required />
				</div>
			</div>

			<div class="row form-group">
			  <div class="col-md-6 text-left">
				<a href="javascript:history.back()" class="btn btn-danger btn-sm"><i class="fa fa-arrow-left"></i> Atras </a>
			 </div>
			  <div class="col-md-1 text-right">
				<input type="submit" class="btn btn-success btn-sm" value="{{ $modo }} AreaTrabajo">
				{{--<input type="submit" class="btn btn-primary btn-sm" value="Guardar">--}}			 </div>

			</div>
                </div>
            </div>
        </div>
    </div>
@stop
