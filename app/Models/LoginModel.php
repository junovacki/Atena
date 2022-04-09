<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\BinaryOp\Equal;

use function PHPUnit\Framework\equalTo;

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
    public function cadastraLogin($params){
        
        $login = $params['login'];
        $senha = $params['senha'];
        $tipoUsuario = $params['tipoUsuario'];
        $select = DB::table('users')
                    ->select('user')
                    ->whereRaw('user = ? ', [$login])->first();

        if($select != null){
            return $error[]='Login já existe no sistema!!';
        }else{
            $insert = DB::table('users')
                        ->insert(['user' => $login,'password' => $senha,'nivelAcesso' => $tipoUsuario]);
            
            if($insert){
                return $error[]='Usuário cadastrado com sucesso!!';
            }
        }
    }
    public function editaLogin($params){
        
        $login = $params['login'];
        $senha = $params['senha'];
        $tipoUsuario = $params['tipoUsuario'];
        
        $insert = DB::table('users')
                    ->where('id', $params['idUsuario'])
                    ->update(['user' => $login,'password' => $senha,'nivelAcesso' => $tipoUsuario])
                    ;
        
        if($insert){
            return $error[]='Usuário atualizado com sucesso!!';
        }
    }
    public function deletaLogin($id){
        
        $insert = DB::table('users')
                    
                    ->delete($id)
                    ;
        
        echo "<script language='javascript' type='text/javascript'>
        alert('Usuário deletado com sucesso');
        window.location.href='/dashboard';</script>";
    }
}
