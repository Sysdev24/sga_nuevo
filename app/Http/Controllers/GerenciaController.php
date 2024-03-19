<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Requests\GerenciaGeneralRequest;
use App\Models\GerenciaGeneral;
use Illuminate\Http\Request;

class GerenciaController extends Controller
{
  public function index()
  {
  //
      $datos['gergral']=GerenciaGeneral::paginate(5);

      return view('gerencia_general.index', $datos);
  }

  /**
  * Show the form for creating a new resource.
  *
   * @return \Illuminate\Http\Response
  */
      public function create()
  {
  //
      return view('gerencia_general.create');
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
      public function store(GerenciaGeneralRequest $request)
  {
      //Esta linea responde en un formato json toda la informafion de datos de empleados
      //$datosEmpleado= request()->all();
      $datosGerencias= request()->except('_token');
      GerenciaGeneral::insert($datosGerencias);

      //return response()->json($datosEmpleado);
      return redirect('gerencia_general')->with('mensaje','Empleado Agregado con exito');
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
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
      public function edit($id)
  {
      //
      $gerencias = GerenciaGeneral::findOrFail($id);

      return view('gerencia_general.edit', compact('gerencias'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Models\Empleado  $empleado
  * @return \Illuminate\Http\Response
  */
      public function update(GerenciaGeneralRequest $request, $id)
  {
      //
      $datosGerencias = request()->except(['_token','_method']);
      GerenciaGeneral::where('id', '=',$id)->update($datosGerencias);

      $gerencias=GerenciaGeneral::findOrFail($id);
      return view('gerencia_general.edit', compact('gerencias'));
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
      GerenciaGeneral::destroy($id);
      return redirect('gerencia_general')->with('mensaje','Gerencia Eliminado con exito');
  }
}

