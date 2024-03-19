@extends('adminlte::page')

@section('title', 'Divisiones')

@section('content_header')
    <center><h1 class="m-0 text-dark">DIVISIONES</h1></center>
@stop

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            @if (session('success'))
                <div class="alert alert-success desva">
                    {{ session('success') }}
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-danger desva">
                  <center><h5><b>{{ session('error') }} </b></h5></center>
                </div>
                @endif
            <div class="card-body">

         <div class="row" style="margin-bottom: 20px; float: right;">
          <a href="{{ url('/area_trabajo/create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Nuevo</a>
         </div>
         <table class="table table-sm  table-hover table-bordered table-striped " style="font-size: 0.8rem">
       <tr  align="center">
        <td><b>División</b></td>
        <td><b>Opciones</b></td>
      </tr>
      @foreach($areaTrabajos as $a)
       <tr>
        <td>{{ $a->descripcion }}</td>
        <td align="center">

            <!-- <abbr title="Ver Información"> <a href="{{ url('area_trabajo/'.$a->id.'/show') }}" class="btn btn-success btn-sm"> <i class="fa fa-eye" aria-hidden="true"></i></a></abbr> -->

            <abbr title="Editar Información"> <a href="{{ url('area_trabajo/'.$a->id.'/edit') }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a></abbr>

            <!-- <abbr title="Eliminar Información"> <form action="{{ url('area_trabajo/'.$a->id) }}" class="btn btn-success btn-sm" method="POST" style="display: inline-block;" onsubmit="return confirm('Seguro desea eliminar este usuario?')">
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
{{ $areaTrabajos->links() }}
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
