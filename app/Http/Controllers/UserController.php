<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Validator;
class UserController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	$usuarios = User::where('estatus',4)
                    ->orWhere('estatus',5)
                    ->orderBy('name','ASC')->paginate(7);
        return view('usuarios.index',compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	$roles = Role::all()->pluck('name');
        return view('usuarios.create',compact('roles'));
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
           'name'       => 'required|max:50',
	       'email'      => 'required|unique:users,email|email',
	       'role'       => 'required',
           'estatus'    => 'required',
	       'cedula'     => 'required|max:8|min:5',
           'usuario'    => 'required|min:5|max:15',
            ],[
            'name.required'     => 'El campo nombre es requerido ',
            'name.max'          => 'El campo nombre debe tener un máximo de 50 carácteres',
            'email.required'    => 'El campo correo es requerido ',
            'email.unique'      => 'Existe en nuestro sistema un usuario con el correo dado',
            'email.email'       => 'Debe indicar un correo de formato válido',
            'role.required'     => 'El campo role es requerido',
            'cedula.required'   => 'El campo cédula es requerido',
            'cedula.max'        => 'El campo cédula no debe ser mayor a 8 digitos',
            'cedula.min'        => 'El campo cédula debe ser mayor a 5 digitos',
            ]);
        //dd($request->all());
        $data = array(
            'name'      => $request->name,
            'email'     => $request->email,
            'usuario'   => $request->usuario,
	        'cedula'    => $request->cedula,
            'estatus'   => $request->estatus,

        );
        //dd($request->all());
	//asignando role a usuario
        User::create($data)->assignRole($request->role);
        return redirect('/usuarios')->with('info', 'Registro Exitoso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user/*$id*/)
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
        $usuario = User::find($id);
	$roles = Role::all()->pluck('name');

        return view('usuarios.edit', compact('roles', 'usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   // public function update(Request $request, $id)
    public function update(Request $request, $id)
    {
	$request->validate([
                'role'          => 'required',
                ]);

	$usuario=User::find($id);
	if($request->password!=null)
	{
		$usuario->password=bcrypt($request->password);
		$usuario->save();
	}
	DB::table('model_has_roles')->where('model_id',$id)->delete();
        $usuario->assignRole($request->role);

        return redirect('/usuarios')->with('message','Usuario Actualizado Correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   // public function destroy($id)
    public function destroy($id)
    {
	$usuario = User::find($id);
	$usuario->estatus= 9;
	$usuario->save();

        return redirect()->route('usuarios.index')
            ->with('info','Usuario desactivado');
    }
}
