@extends('adminlte::page')

@section('title', 'Reporte Auditoria')

@section('content_header')
<br>
    <center><b> <h1 class="m-0 text-dark">Reportes Auditoria Documentos</h1> </b></center>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            {{-- TARJETA DE CRITERIO DE BUSQUEDA --}}
                    <div class="col-12" style="margin-bottom: 20px;">
                        <form action="{{ url('/reportes_extranjeros') }}" method="get" role="form" id="form">
                            {{ csrf_field() }}
                            <input type="hidden" name="search" id="search" value="true" />
                            <div class="form-row">
                               {{-- <div class="form-group col-4">
                                    <label>Tipo Oficina</label>
                                    <select id="tipo_oficina" name="tipo_oficina" class="form-control text-uppercase" onChange="cargarOficinas(this);">
                                        <option value="" selected="selected">Seleccione una opción</option>
                                        @foreach($tipo_oficina as $k => $v)
                                            <option value="{{ $v->id }}">{{$v->nombre}}</option>
                                        @endforeach
                                    </select>
                               </div> --}}

                               {{-- <div class="form-group col-4">
                                <label>Oficinas</label>
                                        <select id="oficina" name="oficina" class="form-control text-uppercase">
                                            <option value="" selected="selected">Seleccione una opción</option>
                                        </select>
                                </div> --}}

                                {{-- <div class="form-group col-4">
                                    <label>Actos</label>
                                        <select id="acto" name="acto" class="form-control text-uppercase"  >
                                            <option value="" selected="selected">Seleccione una opción</option>
                                            @foreach($actos as $k => $v)
                                                <option value="{{ $v->id }}">{{$v->nombre}}</option>
                                            @endforeach
                                        </select>
                                </div> --}}
                                {{-- <div class="form-group col-4">
                                    <label>Forma de pago</label>
                                        <select id="forma_pago" name="forma_pago" class="form-control text-uppercase">
                                            <option value="" selected="selected">Seleccione una opción</option>
                                            @foreach($forma_pago as $k => $v)
                                                <option value="{{ $v->id }}">{{$v->descripcion}}</option>
                                            @endforeach
                                        </select>
                                </div> --}}

                               <!-- <div class="form-group col-4">
                                    <label>Estatus de Usuario</label>
                                        <select id="estatus_usuario" name="estatus_usuario" class="form-control text-uppercase">
                                            <option value="" selected="selected">Seleccione una opción</option>
                                           {{--   @foreach($estatus_usuario as $k => $v)
                                                <option value="{{ $v->id }}">{{$v->estatus}}</option>
                                            @endforeach --}}
                                        </select>
                                </div> -->

                            </div>
                           <!-- <button type="submit" class="btn btn-primary btn-sm"  >
                                <i class="fa fa-search"></i> Buscar</a>
                            </button> -->
                        </form>
                    </div>

            {{-- TARJETA DE CRITERIO DE BUSQUEDA --}}

            {{-- @if($dataUsuario != "") --}}

                <div class="card">
                    <div class="card-header">
                        <div class="col-12" >
                            <h4><strong>Resultados</strong></h4>
                            <!-- <form action="{{-- url('reportes_extranjeros_pdf') --}}" method="get" role="form" id="form">
                                <input type="hidden" name="tipo_oficina_search" id="tipo_oficina_search" value="{{-- $tipo_oficina_search --}}" />
                                <input type="hidden" name="oficina_search" id="oficina_search" value="{{-- $oficina_search --}}" />
                                <input type="hidden" name="acto_search" id="acto_search" value="{{-- $acto_search --}}" />
                                <input type="hidden" name="forma_pago_search" id="forma_pago_search" value="{{-- $forma_pago_search --}}" />
                                <input type="hidden" name="estatus_usuario_search" id="estatus_usuario_search" value="{{-- $estatus_usuario_search --}}" /> -->

                                 <div class="row" style="margin-bottom: 20px;">
                                   <a href="{{ route ('reporteauditoria.excel') }}" class="btn btn-outline-success btn-sm"><i class="fa fa-print"></i> Reporte Excel</a>
                                </div>
                                <!-- <div class="row" style="margin-bottom: 20px;">
                                    <a href="/pdf/docHorizontalUsuario" class="btn btn-success btn-sm"><i class="fa fa-print"></i> Reporte Pdf</a>
                                </div> -->
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-12" style="margin-bottom: 20px;">
                            <div class="form-row table-responsive" >
                                <table class="table table-sm  table-bordered table-striped" style="font-size: 0.8rem" id="dataTable">
                                    <thead align="center" class="bg-success">

                                         <th>Tipo de Usuario</th>
                                         <th> Id del Usuario</th>
                                         <th> Tipo de Evento</th>
                                         <th> Tipo Auditable</th>
                                         <th> Valor Viejo</th>
                                         <th> Valor Nuevo</th>
                                         <th> URL</th>
                                         <th>Dirección ip</th>
                                         <th>Fecha y Hora de la Creación</th>
                                         <th>Fecha y Hora de la Actualización</th>

                                    </thead>
                                    <tbody>
                                        @foreach($usuarios ?? '' as $v)
                                            <tr>

                                                <td>{{$v->user_type}}</td>
                                                <td>{{($v->auditorias->name) ?? '' }}</td>
                                                <td>{{$v->event}}</td>
                                                <td>{{$v->auditable_type}}</td>
                                                <td>{{$v->old_values}}</td>
                                                <td>{{$v->new_values}}</td>
                                                <td>{{$v->url}}</td>
                                                <td>{{$v->ip_address}}</td>
                                                <td>{{$v->created_at}}</td>
                                                <td>{{$v->updated_at}}</td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                 <div class="card-footer mr-auto">
                        {{$usuarios->links() }}
                      </div>
                </div>

            {{--@endif --}}
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


        function cargarOficinas(tipo_oficina) {
            $.ajax({
                method: "POST",
                url: "{{ url('/cargarOficinas') }}",
                data: {tipo_oficina: tipo_oficina.value, '_token': $('input[name=_token]').val()},
                success: function (response) {
                    let html =`
                            <option value="" selected="selected">Seleccione una opción</option>
                    `;
                    for(let i in response.data_oficina){
                        html +=`
                            <option value="${response.data_oficina[i].cod_oficina}">${response.data_oficina[i].nombre}</option>
                        `;
                    }
                    $('#oficina').html(html);
                },
                error: function(response) {
                }
            })


        }





    </script>
@show

