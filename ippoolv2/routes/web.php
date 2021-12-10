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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

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
Route::get('generate/excel/users', 'App\Http\Controllers\UserController@excel');
