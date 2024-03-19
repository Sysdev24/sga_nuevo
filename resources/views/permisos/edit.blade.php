@extends('adminlte::page')
@section('title', 'Editar Permisos')

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
                <div class="card-header"><h2>Editar Permiso</h2></div>

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
                    <form action="{{ route('permisos.update', $permiso->id)}}" method="POST">
                     @csrf
                     @method('PATCH')

                     <div class="container">

                         <div class="form-group">                            
                            <input type="text" class="form-control" 
                            id="name" 
                            placeholder="Name"
                            name="name"
                            value="{{ old('name', $permiso->name)}}"
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
