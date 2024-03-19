@extends('adminlte::page')

@section('title', 'Crear Gerencia Nacional')

@section('content_header')
    <b><h1 class="m-0 text-dark">Editar Gerencia Nacional</h1></b>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
			<div class="row form-group">
				<div class="col-md-1.1">
					<label for="descripcion">Descripcion</label>
				</div>

				<div class="col-md-6">
					<input type="text" class="form-control" name="descripcion" id="descripcion" value="{{ isset($gerencias->descripcion)?$gerencias->descripcion:'' }}" required />
				</div>
			</div>

			<div class="row form-group">
			  <div class="col-md-6 text-left">
				<a href="javascript:history.back()" class="btn btn-danger btn-sm"><i class="fa fa-arrow-left"></i> Atras </a>
			 </div>
			  <div class="col-md-1 text-right">
				<input type="submit" class="btn btn-success btn-sm" value="{{ $modo }} Gerencias">
			 </div>

			</div>
                </div>
            </div>
        </div>
    </div>
@stop
