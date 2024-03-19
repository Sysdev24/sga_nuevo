<?php

namespace App\Http\Controllers;

use App\ArchivoPdf;
use App\Pdf;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PdfControllers extends Controller
{
    public function store(Request $request){

        //$max_code = Thesis::select(
          //  DB::raw(' (IS NULL(MAX(RIGHT(thesis_code,7)),0)) AS number_max')
        //)->first();

        $year = date('Y');
        //$code = 'DOC'.$year.'-'.str_pad($max_code->number_max +1, 7, "0", STR_PAD_LEFT);
           $code= 'SAREN2022';
        $thesis = Pdf::create([
            'pdf_codigo' => $code,
            'nombre_pdf' => $request->input('nombre_pdf'),
            'state_pdf' => ($request->input('state_pdf')?$request->input('state_pdf'):0)
        ]);

        $file = $request->file('file');

        if($file){
            $filename = $file->getClientOriginalName();
            $foo = \File::extension($filename);
            if($foo == 'pdf'){
                $route_file = $code.DIRECTORY_SEPARATOR.date('Ymdhmi').'.'.$foo;
                Storage::disk('public')->put($route_file,\File::get($file));
                ArchivoPdf::create([
                    'pdf_id' => $thesis->id,
                    'url_pdf' => $route_file,
                    'nombre_archivo_pdf' => $filename
                ]);
                return response()->json(['response' => [
                        'msg' => 'Registro Completado',
                        ]
                    ], 201);
            }else{
                return response()->json(['response' => [
                    'msg' => 'Solo Archivos PDF',
                    ]
                ], 201);
            }
        }

    }
    public function urlfile($thesis_id){
        $file = ArchivoPdf::where('pdf_id',$pdf_id)->where('state',1)->first();
        return response()->json(['response' => [
            'url_pdf' => $file->url_pdf,
            'nombre_archivo_pdf' => $file->nombre_archivo_pdf,
            ]
        ], 201);
    }

    public function update(Request $request){
        $id = $request->input('pdf_id');
        $code = $request->input('pdf_codigo');
        Pdf::where('id',$id)->update([
            'nombre_pdf' => $request->input('nombre_pdf'),
            'state_pdf' => ($request->input('state_pdf')?$request->input('state_pdf'):0)
        ]);

        ArchivoPdf::where('pdf_id',$id)->update(['state'=>0]);

        $file = $request->file('file');
        if($file){
            $filename = $file->getClientOriginalName();
            $foo = \File::extension($filename);
            if($foo == 'pdf'){
                $route_file = $code.DIRECTORY_SEPARATOR.date('Ymdhmi').'.'.$foo;
                Storage::disk('public')->put($route_file,\File::get($file));
                ArchivoPdf::create([
                    'pdf_id' => $id,
                    'url_pdf' => $route_file,
                    'nombre_archivo_pdf' => $filename
                ]);
                return response()->json(['response' => [
                        'msg' => 'Se actualizo Correctamente',
                        ]
                    ], 201);
            }else{
                return response()->json(['response' => [
                    'msg' => 'Solo Archivos PDF',
                    ]
                ], 201);
            }
        }

    }

    public function destroy($id){
        Pdf::where('id',$id)->delete();
        return response()->json(['response' => [
            'msg' => 'Eliminado correctamnete',
            ]
        ], 201);
    }
}
