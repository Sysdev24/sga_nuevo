<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'administrador']);
	$role2 = Role::create(['name' => 'configurador']);
	$permission = Permission::create(['name' => 'usuarios.index'])->syncRoles([$role1,$role2]);
	$permission = Permission::create(['name' => 'usuarios.create'])->syncRoles([$role1,$role2]);
	$permission = Permission::create(['name' => 'usuarios.edit'])->syncRoles([$role1,$role2]);
	$permission = Permission::create(['name' => 'usuarios.destroy'])->syncRoles([$role1,$role2]);
	//poder ver listado de tramites y editar
	$permission = Permission::create(['name' => 'tramite_extranjero.index'])->assignRole($role1);
	$permission = Permission::create(['name' => 'tramite_extranjero.edit'])->assignRole($role1);
	$permission = Permission::create(['name' => 'tramite_extranjero_aprobar'])->assignRole($role1);


	$permission = Permission::create(['name' => 'roles.index'])->syncRoles([$role1,$role2]);
	$permission = Permission::create(['name' => 'roles.edit'])->syncRoles([$role1,$role2]);
	$permission = Permission::create(['name' => 'roles.create'])->syncRoles([$role1,$role2]);

	$permission = Permission::create(['name' => 'permisos.index'])->syncRoles([$role1,$role2]);
	$permission = Permission::create(['name' => 'permisos.edit'])->syncRoles([$role1,$role2]);
	$permission = Permission::create(['name' => 'permisos.create'])->syncRoles([$role1,$role2]);

	$permission = Permission::create(['name' => 'roles.destroy'])->syncRoles([$role1,$role2]);
	//$permission = Permission::create(['name' => 'usuarios.destroy'])->syncRoles([$role1,$role2]);
	$permission = Permission::create(['name' => 'permisos.destroy'])->syncRoles([$role1,$role2]);





	
	
    }
}
