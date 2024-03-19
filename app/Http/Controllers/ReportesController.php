<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ReporteExtranjerosExport;
use App\Exports\AuditoriaTramiteExport;
use App\Models\Auditoria;
use App\Exports\AuditoriaUsuariosExport;
use App\Models\CargaDocumento;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\RangoFecha;
use PDF;

class ReportesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

   /* public function fecha_reportes_documentos(Request $request) {

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
          return view('reportes.index')
                ->with(['carga_documentos' => $carga_documentos])
                ->with(['f1' => $f1])
                ->with(['f2' => $f2]);
      }*/

    public function reportes_documentos(Request $request) {
        $f1 = date('d-m-Y', strtotime( '2022-10-21'));
        $f2 = date('d-m-Y');
        //$f1 = $f2 = date('Y-m-d');

        if(! is_null($request->fechaInicial) && ! empty($request->fechaInicial) && ! is_null($request->fechaFinal) || ! empty($request->fechaFinal)) {
            $f1 = $request->fechaInicial;
            $f2 = $request->fechaFinal;
        }
            $carga_documentos = RangoFecha::
                                  orderBy('fecha_documento', 'ASC')
                                  ->whereBetween('created_at',[$f1, $f2])
                                  ->paginate(7);
                              //->get()
    //dd($f1, $f2);
        return view('reportes.index')
        ->with(['carga_documentos' => $carga_documentos])
        ->with(['f1' => $f1])
        ->with(['f2' => $f2]);
    }

    public function reportes_documentos_pdf($f1 ,$f2) {
        ///////////dd($f1, $f2);

        $correspondencias = RangoFecha::orderBy('fecha_documento', 'ASC')
                                ->whereBetween('created_at',[$f1, $f2])
                                ->get();

        //dd($correspondencias);
		$pdf = PDF::loadView('pdf.docHorizontal', compact('correspondencias', 'f1', 'f2'));
		return $pdf ->setPaper('a4','landscape
        ')
					->stream('Reporte_General.pdf'); //Mostrar sin descargar pdf
		 			//->download('archivo-pdf.pdf'); //Descargar pdf
    }

    /**
     * Retorna el reporte de documetos en formato 'xlsx'
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function reportes_documentos_xls($f1, $f2) {
       // dd($f1, $f2);

        return Excel::download(new ReporteExtranjerosExport($f1,$f2), 'reportes_documentos.csv');
    }


    /**
     * Retorna el reporte de documetos en formato 'pdf'
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

      /* ***********************************        Reporte Auditoria Tramite         ************************************************ */

     public function reporte_tramite(Request $request) {
        $tramites['tramites'] = Auditoria::where('auditable_type', 'App\Models\TramiteExtranjero')
        ->orderBy('user_type', 'ASC')
        ->paginate(10);

        return view('reporte_tramite.index', $tramites);
    }

    public function auditoria_tramites_export(Request $request)

    {
        //$usuarios=$request->usuarios;

        return Excel::download(new AuditoriaTramiteExport, 'auditoria_tramites.xlsx');
    }




    /* ***********************************        Reporte Audiotoria Usuarios        ************************************************ */

    public function reporte_auditoria(Request $request) {

        $usuarios['usuarios'] = Auditoria::where('auditable_type', 'App\Models\CargaDocumento')
                                      ->orderBy('user_type', 'ASC')
                                      ->paginate(10);

        return view('reporte_auditoria.index', $usuarios);
    }

    public function auditoria_usuarios_export(Request $request)

    {
        //$usuarios=$request->usuarios;

        return Excel::download(new AuditoriaUsuariosExport, 'auditoria_usuarios.xlsx');
    }

}
