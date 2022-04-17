<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdmController;
use App\Http\Controllers\ProfessorController;
use App\Models\LoginModel;
use App\Models\ProfessorModel;
use App\Models\Adm;

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
Route::get('/cadastroCurso', function () {
    return view('cadastroCurso');
});
Route::get('/cadastroDisciplina', function () {
    return view('cadastroDisciplina');
});
Route::get('/cadastroPergunta', function () {
    return view('cadastroPergunta');
});
Route::get('/editarUsuario/{id}', function ($id) {
    return view('editarUsuario', ['idUsuario' => $id]);
});
Route::get('/editarCurso/{id}', function ($id) {
    return view('editarCurso', ['idCurso' => $id]);
});
Route::get('/editarDisciplina/{id}', function ($id) {
    return view('editarDisciplina', ['idDisciplina' => $id]);
});
Route::get('/editarPergunta/{id}', function ($id) {
    return view('editarPergunta', ['idPergunta' => $id]);
});
Route::get('/deletarUsuario/{id}', function (LoginModel $ids, $id) {
    $ids->deletaLogin($id);
});
Route::get('/deletarCurso/{id}', function (Adm $ids, $id) {
    $ids->deletaCurso($id);
});
Route::get('/deletarDisciplina/{id}', function (Adm $ids, $id) {
    $ids->deletaDisciplina($id);
});
Route::get('/deletarPergunta/{id}', function (ProfessorModel $ids, $id) {
    $ids->deletaPergunta($id);
});

Route::post('/login', [LoginController::class, 'loginUsuario']);

Route::post('/registrarCurso', [AdmController::class, 'cadastrarCurso']);

Route::post('/registrarDisciplina', [AdmController::class, 'cadastrarDisciplina']);

Route::post('/registrarUsuario', [LoginController::class, 'cadastrarUsuario']);

Route::post('/atualizarUsuario', [LoginController::class, 'atualizarUsuario']);

Route::post('/atualizarCurso', [AdmController::class, 'atualizarCurso']);

Route::post('/atualizarDisciplina', [AdmController::class, 'atualizarDisciplina']);

Route::post('/registrarPergunta', [ProfessorController::class, 'cadastraPergunta']);

Route::post('/atualizarPergunta', [ProfessorController::class, 'editaPergunta']);