@extends('adminlte::page')

@section('title', ' Editar Plan')

@section('adminlte_css')

@endsection
@section('content_header')
    <br>
    <center><h3 class="m-0 text-dark"><b>Editar Gerencia Nacional </b></h3></center>
    <hr>
@stop
@section('content')
<br>
        <form action="{{ route('area_trabajo.update',$areaTrabajos->id)}}" method="post">
            @csrf
            @method('PATCH')
            <div class="card container-fluid col-10">
                <div class="card-body">
                   {{--  <div class="col-6">
                        <label><span class="requiredIcon">*</span>Nombre de la Profesión:</label>
                        <input type="text" value="{{ $areaTrabajos->gergral }}" class="form-control"  required readonly>
                      </div>  --}}
                    <div class="col-6">
                      <label><span class="requiredIcon">*</span>Nombre de la Profesión:</label>
                      <input type="text" value="{{ $areaTrabajos->descripcion }}" class="form-control" name="descripcion" required>
                    </div>
                </div>
                <div class="card-footer text-body-secondary text-center">
                    <a href="javascript:history.back()" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Volver </a>
                    <input type="submit" class="btn btn-primary" value="Guardar">
                </div>
              </div>
        </form>
@endsection
