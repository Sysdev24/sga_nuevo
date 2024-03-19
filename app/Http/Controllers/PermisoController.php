<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permisos = Permission::orderBy("id", 'ASC')->paginate(7);
	return view('permisos.index',compact('permisos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
	return view('permisos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
                'name' => 'required|max:50|min:5|unique:permissions,name',
            ],[
               'name.required' => 'El campo nombre es requerido ',
               'name.max' => 'El campo nombre debe tener un máximo de 50 carácteres ',
'name.min' => 'El campo nombre debe tener un minimo de 5 carácteres ',
		'name.unique' => 'Existe en nuestro sistema un role con el nombre dado ',		
            ]);
	Permission::create(['name' => $request->name]);
 return redirect('/permisos')->with('message', 'Registro Exitoso!');

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
	$permiso = Permission::find($id);
        return view('permisos.edit',compact('permiso'));
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

        $validated = $request->validate([
                'name' => 'required|max:50|unique:permissions,name',
		
            ],[
               'name.required' => 'El campo nombre es requerido ',
               'name.max' => 'El campo nombre debe tener un máximo de 50 carácteres ',
		'name.unique' => 'Existe en nuestro sistema un permiso con el nombre dado ',
		
            ]);
	$permiso = Permission::find($id);
	$permiso->name=$request->name;
	$permiso->save();
//asigando los permisos al rol creado	
       return redirect('/permisos')->with('info', 'Actualizacion Exitoso!');
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
}
