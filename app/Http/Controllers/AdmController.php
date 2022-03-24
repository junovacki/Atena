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
}
