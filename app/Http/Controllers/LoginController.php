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
}
