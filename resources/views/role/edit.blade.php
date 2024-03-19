@extends('adminlte::page')
@section('title', 'Editar Roles')

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
                <div class="card-header"><h2>Editar Role</h2></div>

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

                
                    <form action="{{ route('roles.update', $role->id)}}" method="POST">
                     @csrf
                     @method('PATCH')

                     <div class="container">


                         <div class="form-group">                            
                            <input type="text" class="form-control" 
                            id="name" 
                            placeholder="Nombre"
                            name="name"
                            value="{{ old('name', $role->name)}}"
                            >
                          </div>
                          
                          <hr>


                          <h3>Listado de Permisos</h3>


                          @foreach($permisos as $permission)

                          
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" 
                            class="custom-control-input" 
                            id="permission_{{$permission->id}}"
                            value="{{$permission->id}}"
                            name="permission[]"

                            @if( is_array(old('permission')) && in_array("$permission->id", old('permission'))    )
                            checked

                            @elseif( is_array($permission_role) && in_array("$permission->id", $permission_role)    )
                            checked

                            @endif
                            >
                            <label class="custom-control-label" 
                                for="permission_{{$permission->id}}">
                                {{ $permission->id }}
                                - 
                                {{ $permission->name }} 
                                <em>( {{ $permission->description }} )</em>
                            
                            </label>
                          </div>

                          @endforeach
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
