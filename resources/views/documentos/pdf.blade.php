@extends('adminlte::page')

@section('title', ' Documento')

@section('content_header')
    <h1 class="m-0 text-dark">Registro de Documentos Adjunto</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
		   @if ($errors->any())
		    <div class="alert alert-danger">
			<ul>
			    @foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			    @endforeach
			</ul>
		    </div>
		    @endif

		  <form action="/pdf/guardar" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <div class="col-md-6">
                <label for="archivo">Adjuntar Archivo</label>
        
                <input type="file" class="form-control file" name="ruta_doc_id" id="ruta_doc_id" value="{{ old('archivo') }}" required />
            </div>
            <div class="row form-group">
                <div class="col-md-6 text-left">
                   <a href="javascript:history.back()" class="btn btn-outline-success btn-sm"><i class="fa fa-arrow-left"></i> Atras </a>
                </div>
               <div class="col-md-1 text-right">
                   <input type="submit" class="btn btn-success btn-sm" value="Guardar" />
                </div>

   
		</div>

		  </form>
                </div>
            </div>
        </div>
    </div>
@stop