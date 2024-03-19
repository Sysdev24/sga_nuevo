<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function _constructor()
    {
	//otra posible forma de proteger las rutas
	//$this->middleware('can:roles.index')->only('index');
	//$this->middleware('can:roles.edit')->only('edit');
    }
    public function index()
    {
        $roles = Role::orderBy("name")->paginate(7);
	return view('role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permisos = Permission::all();
	return view('role.create',compact('permisos'));
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
                'name' => 'required|max:50|unique:roles,name',
		'permission' =>'required_without_all',
            ],[
               'name.required' => 'El campo nombre es requerido ',
               'name.max' => 'El campo nombre debe tener un máximo de 50 carácteres ',
		'name.unique' => 'Existe en nuestro sistema un role con el nombre dado ',
		'permission.required_without_all' => 'Debe seleccionar algunos de los permisos',
		
            ]);
	//dd($request->all());
//creando role
	$role = Role::create(['name' => $request->name]);
//asigando los permisos al rol creado
$role->permissions()->sync($request->permission);
/*
	foreach($request->permission as $permiso)
	{
	  $role->givePermissionTo($permiso);
	}
*/
	 return redirect('/roles')->with('info', 'Registro Exitoso!');

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	$role = Role::find($id);
        $permisos = Permission::all();
	$permission_role=$role->permissions();

	return view('role.edit',compact('role','permisos','permission_role'));
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
                'name' => 'required|max:50|exists:roles,name',
		'permission' =>'required_without_all',
            ],[
               'name.required' => 'El campo nombre es requerido ',
               'name.max' => 'El campo nombre debe tener un máximo de 50 carácteres ',
		'name.unique' => 'Existe en nuestro sistema un role con el nombre dado ',
		'permission.required_without_all' => 'Debe seleccionar algunos de los permisos',
		
            ]);
	$role=Role::find($id);
	$role->name=$request->name;
	$role->save();
//asigando los permisos al rol creado
	$role->permissions()->sync($request->permission);	
       return redirect('/roles')->with('info', 'Actualizacion Exitoso!');
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
