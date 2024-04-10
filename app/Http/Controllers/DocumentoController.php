<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentoRequest;
use App\Models\AreaTrabajo;
use App\Models\CargaDocumento;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Documento;
use App\Models\GerenciaGeneral;
use App\Models\RutaDocumento;
use App\Models\TipoDocumento;
use App\Models\StatusDocumentos;
use App\Models\User;
use App\Models\Thesis;
use App\Models\DocumentoArchivo;
use App\Models\Observaciones;
use App\Models\Pub;
use App\Models\RangoFecha;
use Illuminate\Support\Facades\Storage;
use Exception;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\FuncCall;



class DocumentoController extends Controller
{
	public function index(){

       $documentos = RangoFecha::orderBy('created_at','DESC')->get(); //->paginate(7);
       $tipo_documento = TipoDocumento::orderBy('descripcion', 'ASC')->get();
       $gerencias = GerenciaGeneral::orderBy('descripcion', 'ASC')->get();

       //dd($tipo_documento);

	   return view('carga_documento.index', compact('documentos','tipo_documento','gerencias'));

	}

    public function busquedas(Request $request)
    {
        $tipo_documento = TipoDocumento::orderBy('descripcion', 'ASC')->get();
        $gerencias = GerenciaGeneral::orderBy('descripcion', 'ASC')->get();

        $tipo_documento2      = $request->get('buscar_tipos_documentos');
        $gerencias2           = $request->get('buscar_gerencias');
        //dd($busquedas);

        $nueva = RangoFecha::tiposdocumentos($tipo_documento2)
        ->gerencias($gerencias2)
        ->paginate(7)
        ->withQueryString();

        if (count($nueva) == 0){
            return redirect('/carga_documento')->with('error','Su busqueda no tiene coincidencia');
        }else{
         return view('carga_documento.index')
         ->with(['tipo_documento' => $tipo_documento])
         ->with(['gerencias' => $gerencias])
         ->with(['documentos' => $nueva]);
        }

    }

    public function fecha_documentos(Request $request) {

        $f1 = $f2 = date('d-m-Y');
        if(! is_null($request->fechaInicial) && ! empty($request->fechaInicial) && ! is_null($request->fechaFinal) || ! empty($request->fechaFinal)) {
            $f1 = $request->fechaInicial;
            $f2 = $request->fechaFinal;
        }
            $carga_documentos = RangoFecha::
                                  orderBy('fecha_documento', 'ASC')
                                  ->whereBetween('created_at',[$f1, $f2])
                                  ->paginate(7)
                                  //->get()
                                  ;
          //dd($carga_documentos)
              return view('carga_documento.index')
                    ->with(['documentos' => $carga_documentos])
                    ->with(['f1' => $f1])
                    ->with(['f2' => $f2]);
          }

	public function create()
    {
        $adm = Auth::user()->cedula;
        $adm1 = Auth::user()->gerencia_id;
		$tipo_documentos = TipoDocumento::orderBy('descripcion', 'ASC')->get();
		$destinatarios = User::orderBy('name', 'ASC')->get();
		//$status_documentos = Status::orderBy('descripcion', 'ASC')->get();
		$gerencias = GerenciaGeneral::orderBy('descripcion', 'ASC')->get();
		$gerencias2 = GerenciaGeneral::orderBy('descripcion', 'ASC')->get();
		//$areas = AreaTrabajo::orderBy('descripcion', 'ASC')->get();
		//$areas2 = AreaTrabajo::orderBy('descripcion', 'ASC')->get();


		return view('carga_documento.create')
		->with('tipo_documentos',$tipo_documentos)
		->with('destinatarios',$destinatarios)
        ->with('gerencias2',$gerencias2)
		->with('adm',$adm)
        ->with('adm1',$adm1)
       //->with('areas2',$areas2)
        //->with('areas',$areas)
		->with('gerencias',$gerencias);



    }

	public function store(Request $request)
    {
		//$this->documentos='';
		DB::transaction(function () use ($request) {
			$documentos = CargaDocumento::create([
			'nro_documento' 		=> $request['nro_documento'],
            'fecha_documento' 		=> $request['fecha_documento'],
            'usuario_emisor_id' 	=> $request['usuario_emisor_id'],
			'gergral_emisor_id' 	=> $request['gergral_emisor_id'],
        	//'area_emisor_id' 		=> $request['area_emisor_id'],
        	'tipo_documento_id'		=> $request['tipo_documento_id'],
        	'observaciones' 		=> $request['observaciones'],
        	//'estatus_docu_id' 		=> $request['estatus_docu_id'=='1'],
        	'usuario_receptor_id' 	=> $request['usuario_receptor_id'],
        	'gergral_receptor_id' 	=> $request['gergral_receptor_id'],
        	//'area_receptor_id' 		=> $request['area_receptor_id'],
        	'asunto' 				=> $request['asunto'],

            ]);
			//$this->carga= $documentos->nro_documento;

			$cedula = Thesis::create([
                //Ojo aqui es en donde asignas la ruta del file a donde ira el documento en este caso es en la carpeta public/ pero puedes definir la carpeta que quieras
                'tramite_id' => $documentos->id,
                'thesis_code' => $request -> file('archivo')-> store(''),
                ]);

                if($request -> file('archivo2')!=null){
                $documento = Documento::create([
                    //Ojo aqui es en donde asignas la ruta del file a donde ira el documento en este caso es en la carpeta public/ pero puedes definir la carpeta que quieras
                    'tramite_id' => $documentos->id,
                    //'thesis_code' => $request -> file('archivo', 'archivo2', 'archivo3') -> store('public/')
                    'documento_code' => $request -> file('archivo2')-> store(''),
                    //'thesis_code' => $request -> file('archivo2'),
                    //'thesis_code' => $request -> file('archivo3')
                ]);
            }
               // dd($request -> file('archivo3') );
                if($request -> file('archivo3')!=null){
                    $pub = DocumentoArchivo::create([
                        //Ojo aqui es en donde asignas la ruta del file a donde ira el documento en este caso es en la carpeta public/ pero puedes definir la carpeta que quieras
                        'tramite_id' => $documentos->id,
                        //'thesis_code' => $request -> file('archivo', 'archivo2', 'archivo3') -> store('public/')
                        'pub_ruta' => $request -> file('archivo3')-> store(''),
                        //'thesis_code' => $request -> file('archivo2'),
                        //'thesis_code' => $request -> file('archivo3')
                ]);
                }

			});

			return redirect()->action([DocumentoController::class, 'index'])
								 ->with('message', /*'Número de Registro:          ****   '. $this->carga . '     ****    ' . */'Registro Exitoso!');
}


	public function fetchGerencia(Request $request){

		$usuarios= User::where("gerencia_id",$request->idGerencia)->get();
		return $usuarios=$usuarios->pluck('name');
	}

	public function fetchDependencia2(Request $request){

		$areas2= AreaTrabajo::where("gergral_id",$request->idGerencia2)->get();
		return $areas2=$areas2->pluck('descripcion','id');
	}

	//Funcion para Crear PDF ('stream' ---> para ver pdf y 'download ---> para descargar pdf')

	public function docHorizontal(){

		$correspondencias = Documento::all();
		$pdf =\Pdf::loadView('documentos.docHorizontal', ['correspondencias' => $correspondencias]);
		return $pdf ->setPaper('a4','landscape
        ')
					->stream('archivo-pdf.pdf'); //Mostrar sin descargar pdf
		 			//->download('archivo-pdf.pdf'); //Descargar pdf
		}


	public function urlfile2($documento_id){
		$file2 = DocumentoArchivo::where('documento_id',$documento_id)->where('state_d',1)->first();
		return response()->json(['response' => [
			'url_d' => $file2->url_d,
			'name_d' => $file2->name_d,
			]
		], 201);
	}


	public function edit($id){

		$observaciones = Observaciones::orderBy('descripcion', 'ASC')
							->get();
							//->pluck('CompletoNombreObservacion','id_tipo_objecion_persona');

		$carga_documentos = CargaDocumento::findOrFail($id);
		//dd($carga_documentos);

		$documento = Documento::where('tramite_id','=',$carga_documentos->id)
		->select('documento_code')->get();
        $noHayPub2=$documento->count();
		$pub = Pub::where('tramite_id','=',$carga_documentos->id)
		->select('pub_ruta')->get();
		$noHayPub=$pub->count();
		$cedula = Thesis::where('tramite_id','=',$carga_documentos->id)
		->select('thesis_code')->get();
		//dd($cedula);


		return view('carga_documento.edit', compact('observaciones', 'carga_documentos', 'cedula', 'documento', 'pub', 'noHayPub','noHayPub2'));
	}

	public function aprobar(Request $request){

	if($request->denegar_solicitud==1)

	{
		$validated = $request->validate([
			'objecion' => 'required',
		]);
	}

		$carga_documentos = CargaDocumento::findOrFail($request->solicitud_id);

	if($request->denegar_solicitud==1)

	{
		$carga_documentos->estatus_docu_id=8;
		$carga_documentos->objecion=$request->objecion;
		//dd($request->objecion);
	}

	else if ($request->aprobar_solicitud==1)

	{
		$carga_documentos->estatus_docu_id=3;
		$carga_documentos->objecion=null;
	}
	else if ($request->enviar_solicitud==1)

	{
		$carga_documentos->estatus_docu_id=2;
		$carga_documentos->objecion=null;
	}
	else if ($request->tramite_solicitud==1)

	{
		$carga_documentos->estatus_docu_id=7;
		$carga_documentos->objecion=null;
	}

	else if ($request->finalizar_solicitud==1)

	{
		$carga_documentos->estatus_docu_id=6;
		$carga_documentos->objecion=null;
	}

		$carga_documentos->save();

	return redirect()->route('carga_documento.index');

	}

	/**
	* Update the specified resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/

	public function update(Request $request, $id)

	{

	//dd($id);
	//$datosExtranjeros = request()->except(['_token','_method']);
	//Ciudadano::where('id', '=',$id)->update($datosExtranjeros);

	//$extranjeros = Ciudadano::findOrFail($id);
	//return view('tramite_extranjero.edit', compact('extranjeros'));

	}

	/* public function formulario(){

	$tipo_pasaportes = TipoPasaporte::orderBy('descripcion', 'ASC')->get();
	dd($tipo_pasaportes);
	return view('tramite_extranjero.formulario')
	   ->with('tipo_pasaportes',$tipo_pasaportes);
	} */

	/**
	* Remove the specified resource from storage.
	*
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function destroy($id)

	{
		// se tiene que enviar el mismo paramentro por eso se coloca 2 veces el id
		CargaDocumento::destroy($id);
		return redirect('/carga_documento')->with('mensaje',' Eliminado con exito');

	}

    public function getPerson(Request $request){
        //dd($request->all());
        $personal = User:://select('users.id','users.name','users.gerencia_id', 'gergral.descripcion')
        where('usuario', $request->usuario)
                        ->leftjoin('gergral', 'gergral.id', '=', 'users.gerencia_id')
                        ->first();
        //dd($personal);
        return response()->json($personal);
    }

}
