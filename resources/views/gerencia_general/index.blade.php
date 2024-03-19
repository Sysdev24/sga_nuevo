@extends('adminlte::page')

@section('title', 'Gerencias Generales')


@section('content')
@if (session('message'))

<div class="alert alert-success alert-dismissible fade show" role="alert">
{{ session('message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
@section('content_header')
    <center><h1 class="m-0 text-dark">GERENCIAS GENERALES</h1></center>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

         <div class="row" style="margin-bottom: 20px; float: right;">
          <a href="{{ url('/gerencia_general/create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Nuevo</a>
         </div>
         <table class="table table-sm  table-hover table-bordered table-striped " style="font-size: 0.8rem">
       <tr align="center">
        <td><b>Descripción</b></td>
        <td><b>Opciones</b></td>
      </tr>
      @foreach($gergral as $g)
       <tr>
        <td>{{ $g->descripcion }}</td>
        <td align="center">

            <!-- <abbr title="Ver Información"> <a href="{{-- url('gerencia_general/'.$g->id.'/show') --}}" class="btn btn-success btn-sm"> <i class="fa fa-eye" aria-hidden="true"></i></a></abbr> -->

            <abbr title="Editar Información"> <a href="{{ url('gerencia_general/'.$g->id.'/edit') }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a></abbr>

           <!--  <abbr title="Eliminar Información"> <form action="{{-- url('gerencia_general/'.$g->id) --}}" class="btn btn-success btn-sm" method="POST" style="display: inline-block;" onsubmit="return confirm('Seguro desea eliminar este usuario?')">
            @csrf
            {{-- method_field('Delete') --}}
                <button type="submit" rel="tooltip">
                <i class="fa fa-trash"></i>
                </button></abbr> -->

        </form>

    </td>
  </tr>
@endforeach
</tbody>
</table>
</div>
</div>
<div class="card-footer mr-auto">
{{ $gergral->links() }}
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
