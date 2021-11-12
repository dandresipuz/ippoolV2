<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\EmpresaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
Route::resource('admin/empresas', EmpresaController::class)->names('admin.empresas');
Route::resource('admin/areas', AreaController::class)->names('admin.areas');
