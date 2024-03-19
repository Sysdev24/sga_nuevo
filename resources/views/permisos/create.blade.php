@extends('adminlte::page')
@section('title', 'Crear Roles')

@section('adminlte_css')
<style>

}
</style>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Crear Permiso</h2></div>

                <div class="card-body">
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

                    <form action="{{ route('permisos.store')}}" method="POST">
                     @csrf

                     <div class="container">
                         <div class="form-group">
			    <label>Nombre</label>                            
                            <input type="text" class="form-control" 
                            id="name" 
                            placeholder="Nombre"
                            name="name"
                            value="{{ old('name')}}"
                            >
                          </div>
                       
                          <hr>
                          <div class="row form-group">
				<div class="col-md-6 text-left">
				  <a href="javascript:history.back()" class="btn btn-default btn-sm"><i class="fa fa-arrow-left"></i> Atras </a>
				   </div>
				   <div class="col-md-1 text-right">
					<input type="submit" class="btn btn-primary btn-sm" value="Guardar">
				 </div>
			</div>
                     </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
