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
        <div class="col-md-10">
            <div class="card">
@if(session('info'))

<div class="alert alert-success">
{{ session('info') }}
</div>
@endif
<br>
</div>
<center> <h1 class="m-0 text-dark">Listado de Usuarios</h1> </center>
<br>

<div class="col-12">
<div class="card">
<div class="card-body">
    <br>

    @can('usuarios.create')
    <a href="{{ route('usuarios.create')}}" class="btn btn-success float-right"><span class="fa fa-plus-circle"></span> Nuevo Usuario</a>
@endcan

 <br>
</div>
<div class="car-body">
    <table class="table table-sm  table-bordered table-striped" style="font-size: 0.8rem">
        <tr align="center" class="bg-success">
            <td><b>#</b></td>
            <td><b>Cedula</b></td>
            <td><b>Nombres y Apellidos</b></td>
            <td><b>Opciones</b></td>

        </tr>
        @foreach($usuarios as $user)
        <tr align="center">
            <td>{{ $user->id}}</td>
            <td>{{ $user->cedula}}</td>
            <td>{{ mb_strtoupper($user->name)}}</td>
            <td>
                <div class="btn-group" role="group" aria-label="Third group">
                @can('usuarios.edit')
                <abbr title="Editar Información">
                    <a href='{{ route('usuarios.edit',$user->id)}}' class='btn btn-warning btn-sm'><i class="fa fa-edit"></i></a>
                </abbr>
                    @endcan
                </div>
                <div class="btn-group" role="group" aria-label="Third group">
                @can('usuarios.destroy')
                <form action="{{route('usuarios.destroy',$user->id)}}" method='post'>
                    @csrf
                    @method('DELETE')
                    <abbr title="Eliminar Información">
                <button type="submit" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i></button>
                    </abbr>
            </form>
                @endcan
            </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
<div class="pagination justify-content-center pace-big-counter-gray">

{{ $usuarios->links() }}
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
