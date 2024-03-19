@extends('adminlte::page')

@section('title', 'Reporte Documentos')

@section('content_header')
<br>
    <center><h1 class="m-0 text-dark"><b>Reportes de Documentos</b></h1></center>
@stop

@section('content')
<div class="row">
    <div class="col-12">
                <div class="card">
     {{--  --}}
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Criterios de Búsqueda</h3>
      <div class="card-tools">
        <!-- Collapse Button -->
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
      </div>
      <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      {{-- 2° Buscador --}}

        <div class="mx-auto pull-right">
            <div class="">
                 <form action="{{ route('usuarios.reportes_documentos') }}" method="GET" class="" role="search">
               {{--  --}}
               <div class="col mt-1">
                <label for="fechaInicio" class="form-label">Fecha Inicio</label>
                <input type="date" class="form-control" id="fechaInicial" name="fechaInicial"  placeholder="AA/MM/DD" value="{{ old('fechaInicial') }}" type="text"/>            </div>

            <div class="col mt-2">
                <label for="fechaFin" class="form-label">Fecha Fin</label>
                <input type="date" class="form-control" id="fechaFinal" name="fechaFinal"  placeholder="AA/MM/DD" value="{{ old('fechaFinal') }}" type="text"/>            </div>
            <br>
            <center><button type="submit" class="btn btn-primary btn-sm"> Filtrar </button>     <a href="{{ url('/reportes_documentos') }}" type="button" class="btn btn-danger btn-sm"><span class="fas fa-sync-alt"></span>  Recargar</a>

            </form>

      </div>
      </div>
      </div>

    </div>
    <!-- /.card-body -->
    {{--   --}}
                    <div class="card-header">
                        <div class="col-12" >
                            <h4><strong>Resultados</strong></h4>
             <!--           <a href="{{-- url("reportes_documentos_xls/".$f1."/".$f2) --}}" class="btn btn-outline-success btn-sm"> <i class="fa fa-print"></i> Reporte Excel</a> -->
                        <a href="{{ url("reportes_documentos_pdf/".$f1."/".$f2) }}" class="btn btn-outline-success btn-sm"><i class="fa fa-print"></i> Reporte PDF</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div >
                            <table style="width: 100%">
                                <tr>
                                <td > <center><h6><b> Desde:  {{  date('d-m-Y', strtotime( $f1 ?? '2022-10-21')) }}  -
                                   Hasta: {{  date('d-m-Y', strtotime($f2 ?? '    ')) }}</b></h6></center></td>
                                  </tr>

                            </table>
                        </div>
                        <div class="col-12" style="margin-bottom: 20px;">
                            <div class="form-row table-responsive-sm">
                                <table class="table table-sm  table-bordered table-striped" style="font-size: 0.8rem" id="dataTable">
                                    <thead align="center" class="bg-success">
                                        <td width='90'><b>N° Documento</b></td>
                                        <td width='90'><b>Fecha</b></td>
                                        <td width='120'><b>Tipo de Documento</b></td>
                                        <td width='300'><b>Cargado por: </b></td>
                                        <td width='300'><b>Destinatario</b></td>
                                      {{--  <td><b>Asunto</b></td>
                                        <td><b>Observaciones</b></td> --}}
                                        <td width='120'><b>Estatus</b></td>
                                    </thead>
                                    <tbody>
                                        @foreach($carga_documentos ?? '' as $k => $v)
                                        <tr align="center">

                                            <tr align="center">
                                                <td>{{ mb_strtoupper($v->nro_documento) }}</td>
                                                <td>{{ date('d-m-Y', strtotime($v->fecha_documento)) ?? '' }}</td>
                                                <td>{{ ($v->tipo_documento) ?? '' }}</td>
                                                <td>{{ mb_strtoupper($v->cargado_por, 'utf-8')}}<br> <b>Gerencia: </b> {{ ($v->dirge_carga)}} <br> <b>Division:</b> {{ ($v->area_carga) ?? ''}} </td>
                                                <td>{{ mb_strtoupper($v->receptor, 'utf-8')}}<br> <b>Gerencia: </b>  {{($v->dirge_receptor)}} <br> <b>Division:</b> {{($v->area_receptor) ?? ''}}</td>
                                              {{--    <td>{{ mb_strtoupper($v->asunto) }}</td>
                                                <td>{{ mb_strtoupper($v->observaciones) }}</td> --}}
                                                <td><h6>{{ mb_strtoupper($v->estatus) ?? '' }}</h6></td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    <div class="card-footer mr-auto">
                        {{ $carga_documentos->links() }}
                      </div>
                </div>
        </div>
    </div>
@stop
@section('adminlte_js')

<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script type="text/javascript">

/* $(document).ready( function () {

            $('#oficina').select2({theme: 'bootstrap4'});
            $('#acto').select2({theme: 'bootstrap4'});

            $("#dataTable").DataTable({
                "columnDefs": [
                {"orderable": false, "targets": 2 }
                ],
                "responsive": true,
                "autoWidth": false,
                "info": false,
                "searching": true,
                "paginate": true,
                "language": {
                    "lengthMenu": "Mostrar registros _MENU_ por página",
                    "zeroRecords": "No se encontró información",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    "search": "Buscar",
                    "paginate": {
                        "previous": "Anterior",
                        "next": "Siguiente"
                    }
                }
            });
}); */








    </script>
@show

