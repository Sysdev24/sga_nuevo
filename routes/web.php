<?php


use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\TramiteExtranjeroController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RecuperaClaveController;
use App\Http\Controllers\DocumentoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

//Rutas de Consulta de Estatus Documentos Usuarios sin acceso al sistema
Route::get('/consulta', [App\Http\Controllers\ConsultaController::class, 'index'])->name('consulta');
Route::get('/verificar', [App\Http\Controllers\ConsultaController::class, 'verificar']);

//Ruta Recuperacion de Contraseña

Route::get('/recupera', [App\Http\Controllers\RecuperaClaveController::class, 'index'])->name('recuperacion.contrasena');
Route::post('/recupera', [App\Http\Controllers\RecuperaClaveController::class, 'store']);

// Fin de ruta

Auth::routes(['register' => true]);

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

// routes para el modulo carga de documentos
Route::middleware(['auth'])->group(function () {
Route::get('/carga_documento', [App\Http\Controllers\DocumentoController::class, 'index'])->middleware('can:carga_documento.index')->name('carga_documento.index');
Route::get('/carga_documento/formulario', [App\Http\Controllers\DocumentoController::class, 'create'])->middleware('can:carga_documento.create')->name('carga_documento.create');
Route::post('/carga_documento', [App\Http\Controllers\DocumentoController::class, 'store'])->name('carga_documento.store');
Route::get('/fetch-dependencia', [DocumentoController::class, 'fetchDependencia']);
Route::get('/fetch-dependencia2', [DocumentoController::class, 'fetchDependencia2']);
Route::get('/carga_documento/{id}/edit', [App\Http\Controllers\DocumentoController::class, 'edit'])->middleware('can:carga_documento.edit')->name('carga_documento.edit');
Route::patch('/carga_documento/{id}', [App\Http\Controllers\DocumentoController::class, 'update'])->middleware('can:carga_documento.edit')->name('carga_documento.update');
Route::delete('/carga_documento/{id}', [App\Http\Controllers\DocumentoController::class, 'destroy'])->name('carga_documento.destroy');
Route::post('/aprobar', [App\Http\Controllers\DocumentoController::class, 'aprobar'])->name('carga_documento_aprobar');

///************  Ruta de Buscandores (Bandeja de Entrada) *///////
Route::get('/busquedas', [App\Http\Controllers\DocumentoController::class, 'busquedas'])->name('busquedas');
Route::get('/busquedas_gerencia', [App\Http\Controllers\DocumentoController::class, 'busquedas_gerencia'])->name('busquedas_gerencia');
Route::get('/fecha_documentos', [App\Http\Controllers\DocumentoController::class, 'fecha_documentos'])->name('fecha_documentos');


// routes para el modulo gerencia general
Route::middleware(['auth'])->group(function () {
    Route::get('/gerencia_general', [App\Http\Controllers\GerenciaController::class, 'index'])->middleware('can:gerencia_general.index')->name('gerencia_general.index');
    Route::get('/gerencia_general/create', [App\Http\Controllers\GerenciaController::class, 'create'])->name('gerencia_general.create');
    Route::post('/gerencia_general', [App\Http\Controllers\GerenciaController::class, 'store'])->name('gerencia_general.store');
    //Route::get('/gerencia_general/{id}', [App\Http\Controllers\GerenciaController::class, 'show'])->name('gerencia_general.show');
    Route::get('/gerencia_general/{id}/edit', [App\Http\Controllers\GerenciaController::class, 'edit'])->name('gerencia_general.edit');
    Route::patch('/gerencia_general/{id}', [App\Http\Controllers\GerenciaController::class, 'update'])->name('gerencia_general.update');
    Route::delete('/gerencia_general/{id}', [App\Http\Controllers\GerenciaController::class, 'destroy'])->name('gerencia_general.destroy');
});

// routes para el modulo Area Trabajo
Route::middleware(['auth'])->group(function () {
    Route::get('/area_trabajo', [App\Http\Controllers\AreaTrabajoController::class, 'index'])->name('area_trabajo.index');
    Route::get('/area_trabajo/create', [App\Http\Controllers\AreaTrabajoController::class, 'create'])->name('area_trabajo.create');
    Route::post('/area_trabajo', [App\Http\Controllers\AreaTrabajoController::class, 'store'])->name('area_trabajo.store');
    Route::get('/area_trabajo/{id}/edit', [App\Http\Controllers\AreaTrabajoController::class, 'edit'])->name('area_trabajo.edit');
    Route::patch('/area_trabajo/{id}', [App\Http\Controllers\AreaTrabajoController::class, 'update'])->name('area_trabajo.update');
    Route::delete('/area_trabajo/{id}', [App\Http\Controllers\AreaTrabajoController::class, 'destroy'])->name('area_trabajo.destroy');

});



///************          Ruta PDF *********************/////

Route::post('/tramite_extranjero/register', [TramiteExtranjeroController::class, 'store'])->name('tramite_extranjero_register');
Route::get('/tramite_extranjero/file/{id}', [TramiteExtranjeroController::class, 'urlfile'])->name('tramite_extranjero_file');
Route::post('/tramite_extranjero/update', [TramiteExtranjeroController::class, 'update'])->name('tramite_extranjero_update');
Route::get('/tramite_extranjero/delete/{id}', [TramiteExtranjeroController::class, 'destroy'])->name('tramite_extranjero_delete');
/**/////////////////////////////////////////////////////////////////////////////////////////////////////*/

    Route::get('/usuarios', [App\Http\Controllers\UserController::class, 'index'])->middleware('can:usuarios.index')->name('usuarios.index');
    Route::get('/usuarios/create', [App\Http\Controllers\UserController::class, 'create'])->middleware('can:usuarios.create')->name('usuarios.create');
    Route::post('/usuarios', [App\Http\Controllers\UserController::class, 'store'])->middleware('can:usuarios.create')->name('usuarios.store');
    Route::get('/usuarios/{id}', [App\Http\Controllers\UserController::class, 'show'])->middleware('can:usuarios.show')->name('usuarios.show');
    Route::get('/usuarios/{id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->middleware('can:usuarios.edit')->name('usuarios.edit');
    Route::patch('/usuarios/{id}', [App\Http\Controllers\UserController::class, 'update'])->middleware('can:usuarios.edit')->name('usuarios.update');
    Route::delete('/usuarios/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->middleware('can:usuarios.destroy')->name('usuarios.destroy');

    //Roles de usuarios
   // Route::resource('/roles', 'RolesController')->names('roles');
    Route::get('/roles', [App\Http\Controllers\RolesController::class, 'index'])->middleware('can:roles.index')->name('roles.index');
    Route::get('/roles/create', [App\Http\Controllers\RolesController::class, 'create'])->middleware('can:roles.create')->name('roles.create');
    Route::post('/roles', [App\Http\Controllers\RolesController::class, 'store'])->name('roles.store');
    Route::get('/roles/{id}', [App\Http\Controllers\RolesController::class, 'show'])->name('roles.show');
     Route::get('/roles/{id}/edit', [App\Http\Controllers\RolesController::class, 'edit'])->middleware('can:roles.edit')->name('roles.edit');
    Route::patch('/roles/{id}', [App\Http\Controllers\RolesController::class, 'update'])->name('roles.update');
    Route::delete('/roles/{id}', [App\Http\Controllers\RolesController::class, 'destroy'])->middleware('can:roles.destroy')->name('roles.destroy');

//permisos de roles
    Route::get('/permisos', [App\Http\Controllers\PermisoController::class, 'index'])->middleware('can:permisos.index')->name('permisos.index');
    Route::get('/permisos/create', [App\Http\Controllers\PermisoController::class, 'create'])->middleware('can:permisos.create')->name('permisos.create');
    Route::post('/permisos', [App\Http\Controllers\PermisoController::class, 'store'])->name('permisos.store');
    Route::get('/permisos/{id}', [App\Http\Controllers\PermisoController::class, 'show'])->name('permisos.show');
    Route::get('/permisos/{id}/edit', [App\Http\Controllers\PermisoController::class, 'edit'])->middleware('can:permisos.edit')->name('permisos.edit');
    Route::patch('/permisos/{id}', [App\Http\Controllers\PermisoController::class, 'update'])->name('permisos.update');
    Route::delete('/permisos/{id}', [App\Http\Controllers\PermisoController::class, 'destroy'])->middleware('can:permisos.destroy')->name('permisos.destroy');


    Route::get('/reportes_documentos', [App\Http\Controllers\ReportesController::class, 'reportes_documentos'])->middleware('can:usuarios.reportes_documentos')->name('usuarios.reportes_documentos');
    Route::get('reportes_documentos_xls/{f1}/{f2}',[App\Http\Controllers\ReportesController::class, 'reportes_documentos_xls'])->name('reportes_documentos_xls');
    Route::get('reportes_documentos_pdf/{f1}/{f2}',[App\Http\Controllers\ReportesController::class, 'reportes_documentos_pdf'])->name('reportes_documentos_pdf');
    Route::get('fecha_reportes_documentos',[App\Http\Controllers\ReportesController::class, 'fecha_reportes_documentos'])->name('fecha_reportes_documentos');

    //Route::get('/Documentos/docHorizontal', [App\Http\Controllers\DocumentoController::class, 'docHorizontal'])->name('documentos_docHorizontal');

    Route::get('/buscador', [App\Http\Controllers\ReportesController::class, 'buscador'])->name('buscador');
    Route::post('/cargarOficinas', [App\Http\Controllers\ReportesController::class, 'cargarOficinas']);

    //Route::get('/reporte_tramite', [App\Http\Controllers\ReportesController::class, 'reporte_tramite'])->name('usuarios.reporte_tramite');
    //Route::get('/auditoria_tramites_export', [App\Http\Controllers\ReportesController::class, 'auditoria_tramites_export'])->name('reporteauditoriatramite.excel');

    Route::get('/reporte_auditoria', [App\Http\Controllers\ReportesController::class, 'reporte_auditoria'])->name('usuarios.reporte_auditoria');
    Route::get('/auditoria_usuarios_export', [App\Http\Controllers\ReportesController::class, 'auditoria_usuarios_export'])->name('reporteauditoria.excel');

    Route::get('/linkstorage', function () {
        Artisan::call('storage:link');
    });

    //Route::resource('/role', 'RoleController')->names('role');

  //  Route::resource('/user', 'UserController', ['except'=>[
    //'create','store']])->names('user');
});

