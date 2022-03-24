<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Adm extends Model
{
    use HasFactory;
    public function cadastraCurso($params){
        
        $nome = $params['nome_curso'];
        $tipo = $params['tipoCurso'];
        $select = DB::table('cursos')
                    ->select('nome_curso')
                    ->whereRaw('nome_curso = ? ', [$nome])->first();

        if($select != null){
            return $error[]='Curso com esse nome já existe no sistema!!';
        }else{
            $insert = DB::table('cursos')
                        ->insert(['nome_curso' => $nome,'tipo_curso' => $tipo]);
            
            if($insert){
                return $error[]='Curso cadastrado com sucesso!!';
            }
        }
    }
    public function cadastraDisciplina($params){
        
        $nome = $params['nome_disciplina'];
        $select = DB::table('disciplinas')
                    ->select('nome_disciplina')
                    ->whereRaw('nome_disciplina = ? ', [$nome])->first();

        if($select != null){
            return $error[]='Disciplina com esse nome já existe no sistema!!';
        }else{
            $insert = DB::table('disciplinas')
                        ->insert(['nome_disciplina' => $nome]);
            
            if($insert){
                return $error[]='Disciplina cadastrada com sucesso!!';
            }
        }
    }
}
