@extends('layouts.app2')


@section('css')
<!-- <link rel="stylesheet" href="{{-- asset('css/kurmaStyle.css') --}}"> -->
<style>
  .error{
    color: red
  }
</style>
@endsection

<div class="fixed-top text-center hidden-banner" style="z-index: -99999">
    <div class="" style="background-color: #e0e0e0">
        <img width="350%" class="img-fluid" src="../../img/fondo_central.png">
    </div>
</div>

@section('content')
<br>
<center> <h1 class="m-0 text-dark">Consulta Documentos</h1> </center>
<br>

<div class="row">
    <div class="col-80">
        <div class="card">
            <div class="card-body">
                <div class="col-30" style="margin-bottom: 20px;">
                    <div class="form-row table-responsive-sm">
                        <table class="table table-sm  table-bordered table-striped" style="font-size: 0.8rem" id="dataTable">
                            <thead align="center" class="bg-success">
                            <td><b>N° Documento</b></td>
                            <td><b>Tipo de Documento</b></td>
                            <td><b>Fecha</b></td>
                            <td><b>Cargado por</b></td>
                            <td><b>Gerencia</b></td>
                            <td><b>Division</b></td>
                            <td><b>Destinatario</b></td>
                            <td><b>Gerencia</b></td>
                            <td><b>Division</b></td>
                            <td><b>Asunto</b></td>
                            <td><b>Observaciones</b></td>
                            <td><b>Estatus de Documento</b></td>
                            <td width="1000" style="background-color: rgb(156, 48, 6)"><b>Rechazado Por:</b></td>
                            </thead>
                        @foreach($documentos as $k =>$v )
                        <tr align="center">
                            <td>{{ mb_strtoupper($v->nro_documento) }}</td>
                            <td>{{ ($v->descripcion) ?? '' }}</td>
                            <td>{{ $v->fecha_documento }}</td>
                            <td>{{ mb_strtoupper($v->emisor, 'utf-8')}}</td>
                            <td>{{ ($v->gergral1) ?? ''}}</td>
                            <td>{{ ($v->area1) ?? ''}}</td>
                            <td>{{ mb_strtoupper($v->receptor, 'utf-8')}}</td>
                            <td>{{($v->gerenciasReceptor->descripcion) ??'' }}</td>
                            <td>{{($v->areaReceptor->descripcion) ??'' }}</td>
                            <td>{{ mb_strtoupper($v->asunto) }}</td>
                            <td>{{ mb_strtoupper($v->observaciones) }}</td>
                            <td>@if($v->estatus_docu_id==1)
                                <div class="alert alert-warning" style="text-align: center;width:100px">Pendiente</div>
                            @elseif ($v->estatus_docu_id==2)
                                <div class="btn btn-success btn" style="text-align: center;width:100px">Enviado</div>
                            @elseif ($v->estatus_docu_id==3)
                                <div class="alert alert-primary" style="text-align: center;width:100px">Aceptado</div>
                            @elseif ($v->estatus_docu_id==4)
                                <div class="alert alert-info" style="text-align: center;width:100px">En Tramite</div>
                            @elseif ($v->estatus_docu_id==5)
                                <div class="alert alert-danger" style="text-align: center;width:100px">Anulado</div>
                            @elseif ($v->estatus_docu_id==6)
                                <div class="alert alert-success" style="text-align: center;width:100px">Finalizado</div>
                            @endif</td>
                            <td>{{ ($v->objecion) ?? '' }}</td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
                    </div>
            <div class="pagination justify-content-center pace-big-counter-gray">
                {{ $documentos->links() }}
                </div>
                    </div>
        </div>
        <center>
            <div class="card-body">
                <div class="col-md-6 text-center">
            <a href="{{ url('/consulta') }}" type="button" class="btn btn-outline-danger"><span class="fa fa-arrow-circle-left"></span>  Volver a Consultar</a>
                </div>
            </div>
        </center>
    </div>


</div>

@endsection

@section('script')



@endsection


