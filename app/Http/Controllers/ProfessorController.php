<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ProfessorModel;

class ProfessorController extends Controller
{
    public static function cadastraPergunta(Request $request){
        $professorModel = new ProfessorModel();

        $error = $professorModel->cadastroPergunta($request->all());


        if($error != null){
            return redirect()->back()->with('alert', $error);
        }else{
            return redirect('/dashboard');
        }
    }
}
