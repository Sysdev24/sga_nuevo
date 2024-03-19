@extends('adminlte::page')

@section('title', 'Bandeja de entrada')

@section('adminlte_css')
<style>
.busqueda{

position: relative;
left: 10px;
}

</style>
@endsection


@section('content')
@if (session('message'))

<div class="alert alert-success alert-dismissible fade show" role="alert">
<h4> <strong>{{ session('message') }}</strong></h4>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
<br>
<center> <h1 class="m-0 text-dark">Listado de Documentos</h1> </center>
<br>

<div class="row">
    <div class="col-12">
        {{--  --}}
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Criterios de Búsqueda por Tipo Documento y Gerencia</h3>
      <div class="card-tools">
        <!-- Collapse Button -->
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
      </div>
      <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
         {{-- 1° Buscador --}}
        <div class="busqueda">
            <div class="mx-auto pull-right">
                <div class="">
                    <form action="{{ route('busquedas') }}" method="GET" class="" role="search">
                   {{--  --}}
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <button type="submit" class="btn btn-outline-primary ">
                            <span class="fas fa-search"></span>
                            </button>
                        </div>
                     <input type="search"  class="form-control rounded" name="busquedas" placeholder="Buscar Tipo de Documento (Solo se admiten letras mayúscula)" id="busquedas" aria-label="Search" aria-describedby="search-addon" />
                 </div>
                    </form>
          </div>
          </div>
          </div>

          {{-- 2° Buscador por gerencias --}}
        <div class="busqueda">
            <div class="mx-auto pull-right">
                <div class="">
                    <form action="{{ route('busquedas_gerencia') }}" method="GET" class="" role="search">
                   {{--  --}}
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <button type="submit" class="btn btn-outline-primary ">
                            <span class="fas fa-search"></span>
                            </button>
                        </div>
                     <input type="search"  class="form-control rounded" name="busquedas" placeholder="Buscar por Gerencias (Solo se admiten letras mayúscula)" id="busquedas" aria-label="Search" aria-describedby="search-addon" />
                 </div>
                    </form>
          </div>
          </div>
          </div></div>

      {{-- 3° Buscador Rango de fecha --}}
    <!-- /.card-body -->
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Criterio de Búsqueda por Rango de Fecha</h3>
          <div class="card-tools">
            <!-- Collapse Button -->
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
          </div>
          <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{route('fecha_documentos') }}" method="GET" class="" role="search">
                {{--  --}}
                <div class="input-group input-daterange" data-date-end-date="0d" >
                 <input type="text" class="form-control" id="fechaInicial" name="fechaInicial" min="23-08-2022" placeholder="Seleccione Fecha Inicial"  value="{{ old('fechaInicial') }}" type="text"/>
                 <input type="text" class="form-control" id="fechaFinal" name="fechaFinal"  min="23-08-2022" placeholder="Seleccione Fecha Final" value="{{ old('fechaFinal') }}" type="text"/>
             </div><br>
             <center><button type="submit" class="btn btn-primary btn-sm"> Buscar</button>     <a href="{{ route('carga_documento.index') }}" type="button" class="btn btn-danger btn-sm"><span class="fas fa-sync-alt"></span>  Limpiar</a>

             </form>
        </div>
        <!-- /.card-body -->
      </div></div>
      <!-- /.card -->
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
                        <td><b>N° Documento</b></td>
                        <td><b>Fecha</b></td>
			            <td><b>Tipo de Documento</b></td>
			            <td width='300'><b>Cargado por: </b></td>
			            <td width='300'><b>Destinatario</b></td>
			            <td><b>Asunto</b></td>
			            <td><b>Observaciones</b></td>
                        <td><b>Opciones</b></td>
                        <td><b>Estatus de Documento</b></td>
                        </thead>
                    @foreach($documentos as $k =>$v )
                    <tr align="center">
                        <td>{{ mb_strtoupper($v->nro_documento) }}</td>
                        <td>{{ date('d-m-Y', strtotime($v->fecha_documento)) ?? '' }}</td>
                        <td>{{ ($v->tipo_documento) ?? '' }}</td>
                        <td>{{ mb_strtoupper($v->cargado_por, 'utf-8')}}<br> <b>Gerencia: </b> {{ ($v->dirge_carga)}} <br> <b>Division:</b> {{ ($v->area_carga) ?? ''}} </td>
                        <td>{{ mb_strtoupper($v->receptor, 'utf-8')}}<br> <b>Gerencia: </b>  {{($v->dirge_receptor)}} <br> <b>Division:</b> {{($v->area_receptor) ?? ''}}</td>
                        <td>{{ mb_strtoupper($v->asunto) }}</td>
                        <td>{{ mb_strtoupper($v->observaciones) }}</td>
                        <td width='100'>
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
                        <td>@if($v->estatus_docu_id==1)
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
                        @endif</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
                   </div>
        </div>
    </div>
    <div class="card-footer mr-auto">
    {{ $documentos->links() }}
    </div>
</div>

@endsection

@section('script')

<link  href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker3.css" rel="stylesheet"/>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/locales/bootstrap-datepicker.es.min.js" charset="UTF-8"></script>

<script>
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
        </script>

@endsection

