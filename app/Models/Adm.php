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
    public function editaCurso($params){
        $insert = DB::table('cursos')
                    ->where('id', $params['idCurso'])
                    ->update(['nome_curso' => $params['nomeCurso'],'tipo_curso' => $params['tipoCurso']])
                    ;
        
        if($insert){
            return $error[]='Curso atualizado com sucesso!!';
        }
    }
    public function deletaCurso($id){
        
        $insert = DB::table('cursos')
                    
                    ->delete($id)
                    ;
        
        echo "<script language='javascript' type='text/javascript'>
        alert('Curso deletado com sucesso');
        window.location.href='/dashboard';</script>";
    }
    public function editaDisciplina($params){
        $insert = DB::table('disciplinas')
                    ->where('id', $params['idDisciplina'])
                    ->update(['nome_disciplina' => $params['nomeDisciplina']])
                    ;
        
        if($insert){
            return $error[]='Disciplina atualizada com sucesso!!';
        }
    }
    public function deletaDisciplina($id){
        
        $insert = DB::table('disciplinas')
                    
                    ->delete($id)
                    ;
        
        echo "<script language='javascript' type='text/javascript'>
        alert('Disciplina deletada com sucesso');
        window.location.href='/dashboard';</script>";
    }
}
