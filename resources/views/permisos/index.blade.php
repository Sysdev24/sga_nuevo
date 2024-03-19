@extends('adminlte::page')
@section('title', 'Listado de Permisos')

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
            <center> <h1 class="m-0 text-dark">Listado de Permisos</h1> </center>
        <br>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <br>
               	    @can('permisos.create')
                        <a href="{{route('permisos.create')}}" class="btn btn-success float-right"> <span class=" fa fa-plus-circle"></span> Nuevo Permiso </a>
		            @endcan
                    <br>
                 </div>
                    <div class="car-body">
                         <table class="table table-sm  table-bordered table-striped" style="font-size: 1.0rem">
                        <tr align="center" class="bg-success">
                            <td><b>#</b></td>
                            <td><b>Nombre</b></td>
                            <td><b>Opciones</b></td>

                        </tr>
                            @foreach ($permisos as $permiso)
                            <tr align="center">
                                <td scope="row">{{ $permiso->id}}</td>
                                <td>{{ $permiso->descripcion}}</td>
                                    <td>
                                @can('permisos.edit')
                                <abbr title="Editar Información">
                                  <a class="btn btn-warning btn-sm" href="{{ route('permisos.edit',$permiso->id)}}"><i class="fa fa-edit"></i></a>
                                </abbr>
                                  @endcan

                                @can('permisos.destroy')
                                  <form action="{{ route('permisos.destroy',$permiso->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Delete</button>
                                  </form>
                                @endcan
                                </td>
                            </tr>
                            @endforeach
                       </tbody>
                      </table>
                      <div class="pagination justify-content-center pace-big-counter-gray">
                      {{ $permisos->links() }}
                    </div>
                    <div class="card-body">
                        <div class="col-md-6 text-left">
                            <a href="{{ route('home') }}" class="btn btn-outline-danger btn-m"><i class="fa fa-arrow-left"></i> Atras </a>
                             </div>
                     <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
