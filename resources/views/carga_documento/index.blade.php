@extends('adminlte::page')

@section('title', 'Bandeja de entrada')

@section('adminlte_css')
 <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
<style>
.busqueda{

position: relative;
left: 10px;
}

</style>
@endsection


@section('content')
<br>

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

<br>
<center> <h1 class="m-0 text-dark">Listado de Documentos</h1> </center>
<br>

<div class="row">
    <div class="col-12">
        {{--  --}}
{{-- BUSCADOR --}}
<div class="card">
    <div class="card-header">
          <h3 class="card-title">Criterios de Búsqueda</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
        </div>
    </div>
    <div class="card-body">
        <div class="busqueda">
            <div class="form-group col-12">
                <nav class="navbar navbar-light float-left">

                        <form action="{{ route('busquedas') }}" method="GET" class="" role="search">


                            <div class="col-auto">
                                <label for="Tipo_documentos" class="col-form-label">Tipo documento: </label>
                            </div>

                            <select id="tipo_documento_id"  name="tipo_documento_id" class="form-control select2">
                                <option value="" selected>Seleccione una Opción</option>
                                 @foreach ($tipo_documento as $d)
                                    <option value="{{$d->id}}">{{$d->descripcion}}</option>
                                @endforeach
                            </select>
                                <div class="col-auto">
                                    <label for="Gerencias" class="col-form-label">Gerencias: </label>
                                </div>
                                <select id="gerencias"  name="buscar_gerencias" class="form-control select2">
                                    <option value="" selected>Seleccione una Opción</option>
                                     @foreach ($gerencias  as $g)
                                        <option value="{{$g->id}}">{{$g->descripcion}}</option>
                                    @endforeach
                                </select>

                              <!--  <div class="col-auto">
                                    <input name="buscar_gerencias" class="form-control mr-sm-2" type="search" placeholder="Buscar por Gerencias" aria-label="Search">
                                </div>-->


                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <button class="btn btn-outline-success my-4 my-sm-0 float-right" type="submit"><i class="fa fa-search" aria-hidden="true"></i>&nbsp;
                                    Buscar</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                            </form>
                </nav>
            </div>
        </div>
    </div>
        <div class="card-footer float-center">
            <a href="{{ route('carga_documento.index') }}">
                <button class="btn btn-outline-danger btn-sm" type="button" title="Recargar">
                    <span class="fas fa-sync-alt"></span> Refrescar
                </button>
                </a>
        </div>
</div>
       {{-- FIN BUSCADOR --}}
        {{-- $adm --}}
    {{--   --}}
        <div class="card">
            <div class="card-body">
               <div class="card-header">
                @can('carga_documento.create')
                <div class="row" style="margin-bottom: 20px; float: right;">
                    <a href="{{ route('carga_documento.create')}}" class="btn btn-success float-right"><i class="fa fa-plus-circle"></i> Documento Nuevo</a>
                   </div>
                   @endcan
                </div>
                  </div>


                   <div class="form-row table-responsive-sm">
                    <table class="table table-sm  table-bordered table-striped" style="font-size: 0.8rem" id="dataTable">
                        <thead align="center" class="bg-success">
                        <th width='15'>#</th>
                        <td><b>Editar</b></td>
                        <td><b>Estatus de Documento</b></td>
                        <td><b>N° Documento</b></td>
                        <td><b>Fecha</b></td>
			            <td><b>Tipo de Documento</b></td>
			            <td width='300'><b>Cargado por: </b></td>
			            <td width='300'><b>Enviado por: </b></td>
			            <!--<td><b>Asunto</b></td>
			            <td><b>Observaciones</b></td>-->

                        </thead>
                    @foreach($documentos as $k =>$v )
                    <tr align="center">
                        <td></td>
                        <td>
                            @can('usuarios.edit')
                            <div class="row">
                                <div style="text-align: center;width:100px">
                                    @if($v->estatus_docu_id < 5)
                                    <abbr title="Editar Información"> <a href="{{ url('carga_documento/'.$v->id.'/edit') }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a></abbr>
                                    @endif
                                </div>
                            </div>
                            @endcan
                        </td>
                        <td>
                            @if($v->estatus_docu_id==1)
                            <div class="alert alert-warning" style="text-align: center;width:100px">Pendiente</div>
                        @elseif ($v->estatus_docu_id==2)
                            <div class="btn btn-success btn" style="text-align: center;width:100px">Enviado</div>
                        @elseif ($v->estatus_docu_id==3)
                            <div class="alert alert-primary" style="text-align: center;width:100px">Aceptado</div>
                        @elseif ($v->estatus_docu_id==7)
                            <div class="alert alert-info" style="text-align: center;width:100px">En Tramite</div>
                        @elseif ($v->estatus_docu_id==8)
                            <div class="alert alert-danger" style="text-align: center;width:100px">Anulado</div>
                        @elseif ($v->estatus_docu_id==6)
                            <div class="alert alert-success" style="text-align: center;width:100px">Finalizado</div>
                        @endif
                        </td>
                        <td>
                            {{ mb_strtoupper($v->nro_documento) }}
                        </td>
                        <td>
                            {{ date('d-m-Y', strtotime($v->fecha_documento)) ?? '' }}
                        </td>
                        <td>{{ ($v->tipo_documento) ?? '' }}</td>
                        <td>{{ mb_strtoupper($v->cargado_por, 'utf-8')}}<br> <b>Gerencia: </b> {{ ($v->dirge_carga)}}  </td>
                        <td>{{ mb_strtoupper($v->receptor, 'utf-8')}}<br> <b>Gerencia: </b>  {{($v->dirge_receptor)}}</td>
                       <!--  <td>{{ mb_strtoupper($v->asunto) }}</td>
                        <td>{{ mb_strtoupper($v->observaciones) }}</td> -->
                    </tr>
                    @endforeach
                </tbody>
            </table>
                   </div>
        </div>
    </div>
    <div class="card-footer mr-auto">
    {{-- $documentos->links() --}}
    </div>
</div>

@endsection

@section('script')

<link  href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker3.css" rel="stylesheet"/>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/locales/bootstrap-datepicker.es.min.js" charset="UTF-8"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>

{{--  <script>
    $(document).ready(function(){
    $('.input-daterange').datepicker({
        format: 'dd-mm-yyyy',
        language: 'es',
        autoclose: true,
        calendarWeeks : true,
        clearBtn: true,
        disableTouchKeyboard: true,
       /* startDate: "23-08-2022",
        opens: 'center',
        firstDay:"1",*/
        },
        function(start, end, label) {
            var years = moment().diff(start, 'years');
        /*console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));*/
        });

    });
        </script> --}}

<script>
    $(document).ready(function() {
        var t = $('#dataTable').DataTable({
            "lengthMenu": [[10,20,50, -1], [10,20,50, "All"]],
            "order": [[ 1, 'desc' ]],
            //"processing": true,
            searching: false,
            paginate: true,
            language: {
            url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json',

        },
        });

        t.on('order ', function () {
            t.column(0).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();
    } );

    </script>

@endsection

