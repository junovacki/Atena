<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\LoginController;

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
    return view('login');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/cadastroUsuario', function () {
    return view('cadastroUsuario');
});

Route::post('/login', [LoginController::class, 'loginUsuario']);

Route::post('/registrarUsuario', [LoginController::class, 'cadastrarUsuario']);