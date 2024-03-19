@extends('adminlte::page')

@section('title', 'Carga Documentos')

@section('content')
    <br>
    <center><h3><b><div class="card-header"> REGISTRO DE CARGA DE DOCUMENTOS </div> </b></h3></center>

                <div class="row form-group">
                    <div class="col-md-4">
                      <label>Cargado por: *(Obligatorio) </label>
                      {{-- <input type="text" id="usuario_emisor_id" name="usuario_emisor_id" class="form-control" placeholder="{{ Auth::user()->name }}" disabled>  --}}
                      <select id="usuario_emisor_id" name="usuario_emisor_id" class="form-control select2">
                        <option value="" selected>Seleccione una Opción</option>
                            @foreach ($destinatarios as $destinatario)
                            <option value="{{$destinatario->id}}">{{$destinatario->name}}</option>
                            @endforeach
                      </select>
                    </div>
                <div class="col-md-4">
                    <label>Gerencia *(Obligatorio)</label>
                    <select id="gergral_emisor_id" name="gergral_emisor_id" class="form-control select2">
                      <option value="" selected>Seleccione una Opción</option>
                           @foreach ($gerencias as $gerencia)
                              <option value="{{$gerencia->id}}">{{$gerencia->descripcion}} </option>
                          @endforeach
                  </select>
                  </div>
                   <div class="col-md-4">
                      <label>División *(Obligatorio)</label>
                      <select id="area_emisor_id" name="area_emisor_id" class="form-control select2">
                          <option value="" selected>Seleccione una Opción</option>
                           {{--  @foreach ($areas as $area)
                          <option value="{{$area->id}}">{{$area->descripcion}} </option>
                      @endforeach --}}
                      </select>
                    </div>
               </div>

 <fieldset>
     <center><h5><b> <div class="card-header">DATOS DEL DOCUMENTO</div></b></h5></center>
 </fieldset>


<div class="row form-group">
    <div class="col-md-3">
        <label>N° Documento *(Obligatorio)</label>
        <input type="text"  placeholder="Ingrese el Nro. del Documento" class="form-control file" name="nro_documento" id="nro_documento" value="{{ old('N°') }}" required />
    </div>
    <div class="col-md-5">
        <label>Tipo de Documento *(Obligatorio)</label>
        <select id="tipo_documento_id"  name="tipo_documento_id" class="form-control select2">
            <option value="" selected>Seleccione una Opción</option>
             @foreach ($tipo_documentos as $d)
                <option value="{{$d->id}}">{{$d->descripcion}}</option>
            @endforeach
        </select>
    </div>
    <br>
    <div class="col-md-4">
    <label>Fecha Registro *(Obligatorio)</label>
    <div class=" input-group">
      <div class="input-group-addon">
      </div>

     <input type="date" min="2022-01-01" class="form-control file" name="fecha_documento" id="fecha_documento" value="{{ old('fecha') }}" required />
         </div>
    </div>
</div>


 <div class="row form-group">
        <div class="col-md-4">
            <label>Destinario *(Obligatorio)</label>
            <select id="usuario_receptor_id" name="usuario_receptor_id" class="form-control select2">
                <option value="" selected>Seleccione una Opción</option>
                 @foreach ($destinatarios as $destinatario)
                <option value="{{$destinatario->id}}">{{$destinatario->name}}</option>
                @endforeach
            </select>
          </div>
          <div class="col-md-4">
            <label>Gerencia *(Obligatorio)</label>
            <select id="gergral_receptor_id" name="gergral_receptor_id" class="form-control select2">
                <option value="" selected>Seleccione una Opción</option>
                     @foreach ($gerencias2 as $gerencia2)
                        <option value="{{$gerencia2->id}}">{{$gerencia2->descripcion}} </option>
                    @endforeach
            </select>
          </div>
          <div class="col-md-4">
              <label>División *(Obligatorio)</label>
              <select id="area_receptor_id" name="area_receptor_id" class="form-control select2">
                <option value="" selected disabled>Seleccione una Opción</option>
            {{--  @foreach ($areas2 as $area2)
            <option value="{{$area2->id}}">{{$area2->descripcion}} </option>
        @endforeach --}}
              </select>
            </div>
        </div>
    <div class="form-group">
            <div class="col-md-14">
              <label>Asunto *(Obligatorio)</label>
              <textarea class="form-control file" placeholder="Ingresar Asunto"   name="asunto" id="asunto" value="{{ old('documento') }}" required ></textarea>
            </div>
            <br>
            <div class="col-md-14">
              <label>Observaciones *(Obligatorio)</label>
              <textarea class="form-control file" placeholder="Observacion.."   name="observaciones" id="observaciones" value="{{ old('documento') }}" required ></textarea>
          </div>
    </div>

        <!-----------------------   INICIO PRUEBA DE FORMULARIO SUBIR PDF -------------------------------->
        <fieldset>
            <center><h5><b> <div class="card-header">ADJUNTAR DOCUMENTOS </div></b></h5></center>
        </fieldset>
        <h6><b>* Nota: (Solo se admiten archivos PDF)</b></h6>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="archivo"><b>Agregar Documento:(2MB) </b></label><br>
                     <input type="file" name="archivo" required>
                </div>

                <div class="form-group">
                    <label for="archivo"><b>Agregar Documento (opcional):(2MB) </b></label><br>
                    <input type="file" name="archivo2" >
                </div>
                <div class="form-group">
                    <label for="archivo"><b>Agregar Documento (opcional): (2MB)</b></label><br>
                    <input type="file" name="archivo3">
                </div>
            </div>


          <!-----------------------   FIN PRUEBA DE FORMULARIO SUBIR PDF -------------------------------->
          <br></div>
          <div class="col-md-5">
          </div>
          <div class="row form-group">
              <!--<div class="col-md-6 text-left">
                 <a href="javascript:history.back()" class="btn btn-primary btn-xl"><i class="fa fa-arrow-left"></i> Atras </a>
              </div>-->
             <div class="col-md-6 text-right">
                 <input type="submit" class="btn btn-success btn-xl" data-dismiss="message" value="Guardar" />
              </div>

         </div>
          </div>
     </form>
           </div>
       </div>
   </div>
</div>
@stop

@section('script')

<script>
    $(document).ready(function () {

$('#gergral_emisor_id').on('change',function(){
    var idGerencia=$(this).val();

    $.ajax({
        url:'/fetch-dependencia',
        type:'get',
        data:{idGerencia:idGerencia},
        dataType:'json',

        success:function(result){
            $("#area_emisor_id").empty()
            for (const key in result) {
                $("#area_emisor_id").append('<option value="' + key + '">' + result[key] + '</option>');
            }
        }
    })
});
});

$(document).ready(function () {

$('#gergral_receptor_id').on('change',function(){
    var idGerencia2=$(this).val();

    $.ajax({
        url:'/fetch-dependencia2',
        type:'get',
        data:{idGerencia2:idGerencia2},
        dataType:'json',

        success:function(result){
            $("#area_receptor_id").empty()
            for (const key in result) {
                $("#area_receptor_id").append('<option value="' + key + '">' + result[key] + '</option>');
            }
        }
    })
});
});


</script>

<script>

    $("#btn-register" ).click(function() {
        var formData = new FormData(document.getElementById("exampleModal"));
        $.ajax({
            url: "{{ route('tramite_extranjero_register') }}",
            type: "post",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        }).done(function(res){
            msg = JSON.parse(res).response.msg
            alert(msg);
            location.reload();
        }).fail(function(res){
            console.log(res)
        });
    });
    function showFile(id){
        $.ajax({
            url: "{{ asset('/tramite_extranjero/file/') }}/"+id,
            type: "get",
            dataType: "html",
            contentType: false,
            processData: false
        }).done(function(res){
            url = JSON.parse(res).response.url
            window.open('storage/'+url,'_blank');
        }).fail(function(res){
            console.log(res)
        });
    }
    $( "#btn-update" ).click(function() {
        var formData = new FormData(document.getElementById("exampleModalEdit"));
        $.ajax({
            url: "{{ route('tramite_extranjero_update') }}",
            type: "post",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        }).done(function(res){
            msg = JSON.parse(res).response.msg
            alert(msg);
            location.reload();
        }).fail(function(res){
            console.log(res)
        });
    });
    function deleteThesis(id){
        $.ajax({
            url: "{{ asset('/tramite_extranjero/delete/') }}/"+id,
            type: "get",
            dataType: "html",
            contentType: false,
            processData: false
        }).done(function(res){
            msg = JSON.parse(res).response.msg
            alert(msg);
            location.reload();
        }).fail(function(res){
            console.log(res)
        });
    }
</script>

<!--  ***********************       VALIDACION DE PDF                ********************   ---->

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->

<script>
    $('input[name="archivo"]').on('change', function(){
      var ext = $( this ).val().split('.').pop();
      if ($( this ).val() != '') {
        if(ext == "pdf"){
           //alert("El documento excede el tamaño máximo");
            if($(this)[0].files[0].size > 2097152){
            alert("¡Advertencia! - El documento excede el tamaño máximo por favor verifique e intente de nuevo");
            ext.value='',
            $(this).val('');
          }else{
            //$("#modal-gral").showFile();
          }
        }
        else
        {
          $( this ).val('');
          alert("Tipo de Documento no permitido: " + ext);
        }
      }
    });
    </script>
<script>
    $('input[name="archivo2"]').on('change', function(){
      var ext = $( this ).val().split('.').pop();
      if ($( this ).val() != '') {
        if(ext == "pdf"){
           //alert("El documento excede el tamaño máximo");
            if($(this)[0].files[0].size > 2097152){
            alert("¡Advertencia! - El documento excede el tamaño máximo por favor verifique e intente de nuevo");
                ext.value='',
            $(this).val('');
            return false;
          }else{
            //$("#modal-gral").showFile();
          }
        }
        else
        {
          $( this ).val('');
          alert("Tipo de Documento no permitido: " + ext);
        }
      }
    });
    </script>
    <script>
        $('input[name="archivo3"]').on('change', function(){
          var ext = $( this ).val().split('.').pop();
          if ($( this ).val() != '') {
            if(ext == "pdf"){
              //alert("La extensión es: " + ext);
              if($(this)[0].files[0].size > 2097152){
                //console.log(window.location.href);
                alert("¡Advertencia! - El documento excede el tamaño máximo por favor verifique e intente de nuevo")
                ext.value='',
                $(this).val('');
              }else{
                //$("#modal-gral").hide();
              }
            }
            else
            {
              $( this ).val('');
              alert("Tipo de Documento no permitido: " + ext);
            }
          }
        });
        </script>

@endsection
