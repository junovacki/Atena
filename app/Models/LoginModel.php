<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class LoginModel extends Model
{
    use HasFactory;
    protected $table = 'users';

    protected $fillable = [
        'usuarioLogin',
        'senhaLogin',
        '_token',
    ];

    public function verificaLogin($params){
        
        $login = $params['usuarioLogin'];
        $senha = $params['senhaLogin'];
        $select = DB::table('users')
                    ->select('user', 'nivelAcesso')
                    ->whereRaw('user = ? AND password = ? ', [$login,$senha])->first();

        if($select == null){
            return $error[]='Login/Senha incorreto(s)!!';
        }else{
            setcookie("login",$login);
            setcookie("nivelUsuario",$select->nivelAcesso);
        }
    }
}
