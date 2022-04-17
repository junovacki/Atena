<?php

namespace App\Http\Controllers;

use App\Models\Adm;

use Illuminate\Http\Request;

class AdmController extends Controller
{
    public static function cadastrarCurso(Request $request){
        $admModel = new Adm();



        $error = $admModel->cadastraCurso($request->all());


        if($error != null){
            return redirect()->back()->with('alert', $error);
        }else{
            return redirect('/cadastroCurso');
        }
    }
    public static function cadastrarDisciplina(Request $request){
        $admModel = new Adm();



        $error = $admModel->cadastraDisciplina($request->all());


        if($error != null){
            return redirect()->back()->with('alert', $error);
        }else{
            return redirect('/cadastroDisciplina');
        }
    }
    public static function atualizarDisciplina(Request $request){
        $admModel = new Adm();
        $id = $request->all();
        $error = $admModel->editaDisciplina($request->all());
        if($error != null){
            return redirect()->back()->with('alert', $error);
        }else{
            return redirect('/editarDisciplina/'.$id['idDisciplina'].'/');
        }
    }
    public static function atualizarCurso(Request $request){
        $admModel = new Adm();
        $id = $request->all();
        $error = $admModel->editaCurso($request->all());
        if($error != null){
            return redirect()->back()->with('alert', $error);
        }else{
            return redirect('/editarCurso/'.$id['idCurso'].'/');
        }
    }
}
