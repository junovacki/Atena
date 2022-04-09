<?php

namespace App\Http\Controllers;

use App\Models\LoginModel;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public static function loginUsuario(Request $request){
        
        $login = $request->all('usuarioLogin');
        $senha = $request->all('senhaLogin');
        $loginModel = new LoginModel();

        $error = $loginModel->verificaLogin($request->all());


        if($error != null){
            return redirect()->back()->with('alert', $error);
        }else{
            return redirect('/dashboard');
        }
    }

    public static function cadastrarUsuario(Request $request){
        $loginModel = new LoginModel();

        $error = $loginModel->cadastraLogin($request->all());


        if($error != null){
            return redirect()->back()->with('alert', $error);
        }else{
            return redirect('/cadastroUsuario');
        }
    }

    public static function atualizarUsuario(Request $request){
        $loginModel = new LoginModel();

        $error = $loginModel->editaLogin($request->all());


        if($error != null){
            return redirect()->back()->with('alert', $error);
        }else{
            return redirect('/editarUsuario');
        }
    }

    public static function removerUsuario(Request $request){
        $loginModel = new LoginModel();

        $error = $loginModel->deletaLogin($request->all());


        if($error != null){
            return redirect()->back()->with('alert', $error);
        }else{
            return redirect('/dashboard');
        }
    }
}
