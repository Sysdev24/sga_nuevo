<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\AreaTrabajoRequest;
use App\Models\AreaTrabajo;
use App\Models\GerenciaGeneral;
use Illuminate\Http\Request;

class AreaTrabajoController extends Controller
{
  public function index()
  {
  //
     $datos['areaTrabajos']=AreaTrabajo::paginate(5);
        //dd($datos);
      return view('area_trabajo.index', $datos);
  }

  /**
   *Muestra el formulario para crear un nuevo recurso
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      //
      $gergral =GerenciaGeneral::orderBy('descripcion', 'ASC')->get();
      //$areaTrabajos= AreaTrabajo::orderBy('descripcion', 'ASC')->get();
      return view('area_trabajo.create')->with(['gergral' => $gergral]);
  }

  /**
  * Almacene un recurso recién creado en el almacenamiento.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
      public function store(AreaTrabajoRequest $request)
  {
      //Esta linea responde en un formato json toda la informafion de datos de AreaTrabajo
      //$datosArea= request()->all();
      //$datosArea= request()->except('_token');
      //AreaTrabajo::insert($datosArea);
       //return response()->json($datosArea);
      //return redirect('area_trabajo')->with('mensaje','Area Agregada con exito');

      DB::transaction(function () use ($request ) {
        $area = $request->validate([
            'gergral_id'                  =>'required',
            'descripcion'                 =>'required|max:500',],
            $message = ['required'=>'el campo :attribute es requerido',
            'max' => 'Te excediste del numero de caracteres permitidos'
        ]);
        //dd($profesiones);
        $data2 = AreaTrabajo::create($area);
    });
        return redirect()->action([AreaTrabajoController::class, 'index'])
        ->with('success', 'Registro Exitoso!');


  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
      public function show($id)
  {

  }

  /**
  *
  *Muestra el formulario para editar el resource especificado.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
      public function edit($id)
  {
      //
      $areaTrabajos=AreaTrabajo::findOrFail($id);
      //select('gergral.descripcion as gergral', 'area_trabajo.id', 'area_trabajo.descripcion as area' )
      //->leftjoin('gergral', 'gergral.id' ,'=', 'area_trabajo.gergral_id')

        //dd($areaTrabajos);
      return view('area_trabajo.edit', compact('areaTrabajos'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Models\Empleado  $empleado
  * @return \Illuminate\Http\Response
  */
      public function update(AreaTrabajoRequest $request, $id)
  {
      //
      /*$datosArea = request()->except(['_token','_method']);
      AreaTrabajo::where('id', '=',$id)->update($datosArea);

      $area=AreaTrabajo::findOrFail($id);
      return view('area_trabajo.edit', compact('area'));*/

      $validated = $request->validate([
        'descripcion'                 =>'required|max:500',

    ],$message = ['required'=>'el campo :attribute es requerido',
    'max' => 'Te excediste del numero de caracteres permitidos'

    ]);
        $area = AreaTrabajo::find($id);
        $area->descripcion = $request->descripcion;

        $area->save();

       return redirect('/area_trabajo')->with('success', 'Actualizacion Exitosa!');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Models\Empleado  $empleado
  * @return \Illuminate\Http\Response
  */
      public function destroy($id)
  {
      // se tiene que enviar el mismo paramentro por eso se coloca 2 veces el id
      AreaTrabajo::destroy($id);
      return redirect('area_trabajo')->with('mensaje','Area Eliminado con exito');
  }


}

