<?php

namespace App\Http\Controllers;

use App\Models\CargaDocumento;
use Illuminate\Http\Request;
use App\Http\Requests\ConsultaRequest;

class ConsultaController extends Controller
{
    public function index()
    {

        return view('consulta.buscar');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function verificar(ConsultaRequest $request)
    {

          $usuario = CargaDocumento::where('nro_documento', $request->nro_documento)
                                    ->first();

        //$this->$usuario -> buscador;
        //$usuario = User::where('cedula', $request->cedula)->first();
       //dd($usuario);

        if ($usuario== null) {

                return redirect('/buscar')->with('status', 'Número de Documento no esta registrado en el sistema');
        }else{

        $usuario = $request->nro_documento;
        //dd($request -> numero_pasaporte );
        //dd($request -> all() );
        $nueva = CargaDocumento::join('users','users.id','carga_documentos.usuario_emisor_id')
            ->join('gergral','gergral.id','carga_documentos.gergral_emisor_id')
           // ->join('area_trabajo','carga_documentos.area_emisor_id','=','area_trabajo.id')
            ->leftjoin('tipo_documento','tipo_documento.id','carga_documentos.tipo_documento_id')
            ->leftjoin('estatus','estatus.id','carga_documentos.estatus_docu_id')
            ->leftjoin('objecion', 'objecion.id', 'carga_documentos.objecion')
            ->select(
                    'carga_documentos.nro_documento',
                    'users.name as emisor',
                    'gergral.descripcion as gergral1',
                    //'area_trabajo.descripcion as area1',
                    'tipo_documento.descripcion',
                    'carga_documentos.asunto',
                    'carga_documentos.fecha_documento',
                    'carga_documentos.observaciones',
                    'carga_documentos.estatus_docu_id as estatus_docu_id',
                    'objecion.descripcion as objecion',
                    )
            ->where('nro_documento','LIKE','%'.$usuario.'%')
            ->orderBy('nro_documento', 'ASC')
            ->paginate(10)
            ->withQueryString();
        //dd($solicitudes);

        if($usuario)
        {
            return view('consulta.busqueda', $nueva)
            ->with(['documentos' => $nueva]);
        }
        else
        {
          return redirect('/consulta')->with('error', 'Se ha presentado un error.!');
        }
 }

}

}
