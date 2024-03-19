@extends('adminlte::page')
@section('title', 'Listado de Roles')

@section('adminlte_css')

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
@if(session('info'))

<div class="alert alert-success">
{{ session('info') }}
</div>
@endif
<br>
            </div>
<center> <h1 class="m-0 text-dark">Listado de Roles</h1> </center>
<br>

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <br>

            @can('roles.create')
                <a href="{{route('roles.create')}}" class="btn btn-success float-right" ><span class=" fa fa-plus-circle"></span> Nuevo Rol </a>
             @endcan

             <br>
            </div>
            <div class="car-body">
                <table class="table table-sm  table-bordered table-striped" style="font-size: 1.0rem">
                    <tr align="center" class="bg-success">
                        <td><b>N° de Roles</b></td>
                        <td><b>Tipo de Roles</b></td>
                        <td><b>Opciones</b></td>

                    </tr>
                    @foreach($roles as $role)
                    <tr align="center">
                        <td>{{ mb_strtoupper($role->id)}}</td>
                        <td>{{ mb_strtoupper($role->name)}}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Third group">
                           @can('roles.edit')
                            <abbr title="Editar Información">
                              <a class="btn btn-warning btn-sm" href="{{ route('roles.edit',$role->id)}}"><i class="fa fa-edit"></i></a>
                            </abbr>
                              @endcan
                            </div>
                            <div class="btn-group" role="group" aria-label="Third group">
                            @can('roles.destroy')
                              <form action="{{ route('roles.destroy',$role->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <abbr title="Eliminar Información">
                                <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                </abbr></form>
                            @endcan
                        </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    <div class="pagination justify-content-end pace-big-counter-gray">

    {{ $roles->links() }}
    </div>
        <div class="card-body">
            <div class="col-md-6 text-left">
                <a href="{{ url('/carga_documento') }}" class="btn btn-outline-danger btn-m"><i class="fa fa-arrow-left"></i> Atras </a>
                 </div>
         <br>
        </div>
        </div>
</div>

@endsection
