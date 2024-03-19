@extends('adminlte::page')

@section('title', 'Información Documento')

@section('content_header')
    <h1 class="m-0 text-dark">Información del Documento</h1>
@stop


@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-header">
           <b> Datos </b>
        </div>
        <div class="card">

            <div class="card-body">
                <table class="table table-responsive">
                    <tbody>
                        <tr>
                          <td>Nro. Documento: </td><td><b>{{ $carga_documentos->nro_documento }} </b></td>
                        </tr>
                        <tr>
                            <td>Fecha del Documento: </td><td><b>{{ $carga_documentos->fecha_documento }}</b></td>
                        </tr>
                        <tr>
                            <td>Tipo de Documento: </td><td><b>{{ ($carga_documentos->tipoDocumento->descripcion) ?? '' }}</b></td>
                        </tr>
                        <tr>
                           <td>Usuario Emisor</td><td><b>{{ ($carga_documentos->emisor->name) ?? ''}}</b></td>
                        </tr>
                        <tr>
                           <td>Gerencia Emisor</td><td><b>{{ ($carga_documentos->gerenciasEmisor->descripcion) ??''}}</b></td>
                        </tr>
                        <tr>
                            <td>División Emisor</td><td><b>{{($carga_documentos->areaEmisor->descripcion) ??'' }}</b></td>
                        </tr>
                        <tr>
                            <td>Asunto</td><td><b>{{$carga_documentos->asunto}}</b></td>
                        </tr>
                        <tr>
                            <td>Observaciones</td><td><b>{{$carga_documentos->observaciones}}</b></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card-header">
           <b> Datos de Destino</b>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table table-responsive">
                    <tbody>
                        <tr>
                            <td>Usuario Receptor</td><td><b>{{ ($carga_documentos->receptor->name) ?? ''}}</b></td>
                         </tr>
                         <tr>
                            <td>Gerencia Receptor</td><td><b>{{($carga_documentos->gerenciasReceptor->descripcion) ??'' }}</b></td>
                         </tr>
                         <tr>
                             <td>División Receptor</td><td><b>{{($carga_documentos->areaReceptor->descripcion) ??'' }}</b></td>
                         </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card-header">
            <b>Documentación</b>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table table-responsive table-striped table-hover">
                    <thead>
                        <tr>
                        <th>Documento 1</th>
                        <th>Documento 2</th>
                        <th>Documento 3</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                           <td><a href="{{ url("storage/".$cedula[0]->thesis_code) }}" target="_blank" ><img src="{{ asset('images/documento.jpg') }}" class="img img-rounded" style="margin-left: 10px" width="70" height="70"></a></td>
                              <td>@if($noHayPub2!=0)<a href="{{ url("storage/".$documento[0]->documento_code) }}" target="_blank" ><img src="{{ asset('images/documento.jpg') }}" class="img img-rounded" style="margin-left: 10px" width="70" height="70">@endif</a></td>
                            <td>@if($noHayPub!=0)<a href="{{ url("storage/".$pub[0]->pub_ruta) }}" target="_blank" ><img src="{{ asset('images/documento.jpg') }}" class="img img-rounded" style="margin-left: 10px" width="70" height="70"></a>@endif</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="/aprobar" method="post" id="aprobar-form">
                    @csrf
                    <input type="hidden" name="solicitud_id" value="{{ $carga_documentos->id }}" />

                    <input type="hidden" name="aprobar_solicitud" id="aprobar_solicitud" value="0" />
                    <input type="hidden" name="estatus_actual" id="estatus_actual" value="{{ $carga_documentos->estatus_docu_id }}" />
                    <input type="hidden" name="denegar_solicitud" id="denegar_solicitud" value="0" />
                    <input type="hidden" name="enviar_solicitud" id="enviar_solicitud" value="0" />
                    <input type="hidden" name="tramite_solicitud" id="tramite_solicitud" value="0" />
                    <input type="hidden" name="finalizar_solicitud" id="finalizar_solicitud" value="0" />
                    <div><label for="objecion"><span class="requiredIcon">*</span>Observación en caso de denegar la solicitud:</label>
                        <select class="form-control" id="objecion" name="objecion" required>
                            <option value="" selected>Seleccione una opción</option>
                              @foreach ($observaciones as $observacion)
                                <option value="{{$observacion->id}}">{{$observacion->descripcion}} </option>
                            @endforeach -
                        </select>
                    </div>
                    <br>
                  @if ($carga_documentos->estatus_docu_id==2)
                    <button type="button" id="denegar" class="btn btn-danger">Denegar</button>
                    <button type="button" id="finalizar" class="btn btn-success">Finalizar</button>
                    @else

                    <button type="button" id="aprobar" class="btn btn-primary">Aprobar</button>
                    <button type="button" id="denegar" class="btn btn-danger">Anular</button>
                    <button type="button" id="tramite" class="btn btn-info">En Tramite</button>
                    <button type="button" id="enviado" class="btn btn-info">Enviado</button>
                    @endif

                    <a href="{{ route('carga_documento.index') }}" class=" btn btn-warning">Volver
                    </a>
                </form>
            </div>
            <div class="alert alert-default-danger" role="alert">
                <h6 class="text-center"><b>* Nota: (Se tiene que seleccionar obligatoriamente una observación para denegar un documento)</b></h6>
            </div>
        </div>
    </div>
</div>
<div class="row">
<div id="error">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
           @foreach ($errors->all() as $error)
                <li> {{ $error }} </li>
            @endforeach
        </ul>
    </div>
@endif
</div>
</div>
@endsection
@section('adminlte_js')
<script>
$(document).ready(function () {
    $("#finalizar_solicitud").val('0');
    $("#aprobar_solicitud").val('0');
    $("#denegar_solicitud").val('0');
    $("#tramite_solicitud").val('0');
    $("#enviar_solicitud").val('0');

    $('#aprobar').on('click',function(event){
        $("#finalizar_solicitud").val('0');
        $("#aprobar_solicitud").val('1');
        $("#denegar_solicitud").val('0');
        $("#tramite_solicitud").val('0');
            $("#enviar_solicitud").val('0');
        $("#aprobar-form").submit();

    });
    $('#finalizar').on('click',function(event){
        if($("#estatus_actual").val()=='2')
        {
            $("#finalizar_solicitud").val('1');
            $("#aprobar_solicitud").val('0');
            $("#denegar_solicitud").val('0');
            $("#tramite_solicitud").val('0');
            $("#enviar_solicitud").val('0');
            $("#aprobar-form").submit();
        }
        else
        {
            alert("La solicitud debe estar aprobada");
            return false;
        }


    });
    $('#denegar').on('click',function(event){
        $("#finalizar_solicitud").val('0');
        $("#aprobar_solicitud").val('0');
        $("#denegar_solicitud").val('1');
        $("#enviar_solicitud").val('0');
        $("#tramite_solicitud").val('0');
        $("#aprobar-form").submit();
    });
    $('#tramite').on('click',function(event){
        $("#finalizar_solicitud").val('0');
        $("#aprobar_solicitud").val('0');
        $("#denegar_solicitud").val('0');
        $("#tramite_solicitud").val('1');
        $("#enviar_solicitud").val('0');
        $("#aprobar-form").submit();
    });
    $('#enviado').on('click',function(event){
        $("#finalizar_solicitud").val('0');
        $("#aprobar_solicitud").val('0');
        $("#denegar_solicitud").val('0');
        $("#tramite_solicitud").val('0');
        $("#enviar_solicitud").val('1');
        $("#aprobar-form").submit();
    });
});
</script>
@endsection
