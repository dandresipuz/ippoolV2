<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\AliadoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\IpaddressController;
use App\Http\Controllers\WansolarwindController;
use App\Http\Controllers\CentralizadorController;


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
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/admin', function () {
    return view('admin.admin');
})->name('admin.admin');

Route::get('/admin', function () {
    return view('admin.admin');
});

Route::resource('admin/users', UserController::class)->names('admin.users');
Route::resource('admin/aliados', AliadoController::class)->names('admin.aliados');
Route::resource('admin/areas', AreaController::class)->names('admin.areas');
Route::resource('admin/empresas', EmpresaController::class)->names('admin.empresas');
Route::resource('admin/centralizadores', CentralizadorController::class)->names('admin.centralizadores');
Route::resource('admin/ipaddresses', IpaddressController::class)->names('admin.ipaddresses');
Route::resource('admin/wansolarwinds', WansolarwindController::class)->names('admin.wansolarwinds');

// Export excel
Route::get('generate/excel/users', 'App\Http\Controllers\UserController@excel');
Route::get('generate/excel/centralizadores', 'App\Http\Controllers\CentralizadorController@excel');
Route::get('generate/excel/empresas', 'App\Http\Controllers\EmpresaController@excel');
Route::get('generate/excel/ipaddresses', 'App\Http\Controllers\IpaddressController@excel');
Route::get('generate/excel/wansolarwinds', 'App\Http\Controllers\WansolarwindController@excel');

// Import excel
Route::post('import/excel/users', 'App\Http\Controllers\UserController@import');
Route::post('import/excel/centralizadores', 'App\Http\Controllers\CentralizadorController@import');
Route::post('import/excel/empresas', 'App\Http\Controllers\EmpresaController@import');
Route::post('import/excel/ipaddresses', 'App\Http\Controllers\IpaddressController@import');
Route::post('import/excel/wansolarwinds', 'App\Http\Controllers\WansolarwindController@import');

// Change password
Route::get('profile/password', 'App\Http\Controllers\UserController@passwordForm');
Route::post('profile/updatepassword', 'App\Http\Controllers\UserController@updatePassword');

// Release Resource
Route::get('release/empresas', 'App\Http\Controllers\EmpresaController@indexResource');
Route::get('release/empresas/ipaddress/{id}/edit', 'App\Http\Controllers\EmpresaController@releaseResource');
Route::get('release/empresas/wansolarwind/{id}/edit', 'App\Http\Controllers\EmpresaController@releaseVprnResource');
Route::post('release/ipaddress', 'App\Http\Controllers\EmpresaController@updateResource');
Route::post('release/wansolarwind', 'App\Http\Controllers\EmpresaController@updateVprn');

// Add Resource
Route::get('resource/ipaddresses', 'App\Http\Controllers\IpaddressController@addIndexResource');
Route::get('resource/ipaddresses/{id}/edit', 'App\Http\Controllers\IpaddressController@addEditResource');
Route::get('resource/wansolarwinds', 'App\Http\Controllers\WansolarwindController@addIndexResource');
Route::get('resource/wansolarwinds/{id}/edit', 'App\Http\Controllers\WansolarwindController@addEditResource');

// Query module

Route::get('lista/empresas', 'App\Http\Controllers\EmpresaController@indexEmpresas')->name('consulta.empresas.index');
Route::get('lista/empresas/create', 'App\Http\Controllers\EmpresaController@createEmpresa');
Route::post('lista/empresas', 'App\Http\Controllers\EmpresaController@storeEmpresa');
Route::get('lista/empresas/{id}', 'App\Http\Controllers\EmpresaController@showEmpresa');

Route::get('lista/wansolarwind', 'App\Http\Controllers\WansolarwindController@indexWansolarwinds');
Route::get('lista/wansolarwind/{id}', 'App\Http\Controllers\WansolarwindController@showWansolarwind');
