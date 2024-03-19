@extends('adminlte::page')
@section('title', 'Listado de Usuarios')

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
                <div class="card-header"><h2>Lista</h2></div>

                <div class="card-body">
		<a href="{{ route('usuarios.create')}}" class="btn btn-primary float-right">Nuevo usuario</a>
<a href="{{route('role.create')}}" 
                      class="btn btn-primary float-right"
                      >Nuevo Rol
                    </a>
                    <br><br>

                   
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Role(s)</th>
                            <th colspan="3"></th>
                          </tr>
                        </thead>
                        <tbody>
                         @foreach ($usuarios as $user)
                            
                            <tr>
                                <th scope="row">{{ $user->id}}</th>
                                <td>{{ $user->name}}</td>
                                <td>{{ $user->email}}</td>
                                <td>
                                @isset( $user->roles[0]->name )
                                  {{ $user->roles[0]->name}}
                                @endisset
                                
                                </td>
                                <td> 
                                <a href='' class='btn btn-info'>Editar</a> 
				<a href='' class='btn btn-danger'>Eliminar</a> 
                                  

                                </td>  
                            </tr>      
                            @endforeach
                        </tbody>
                      </table>
                      {{ $usuarios->links() }} 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
