<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProfessorModel extends Model
{
    use HasFactory;
    public function cadastroPergunta($params)
    {
        
        $alternativaA = false;
        $alternativaB = false;
        $alternativaC = false;
        $alternativaD = false;
        if(isset($params['checkA'])){
            $alternativaA = true;
        }
        if(isset($params['checkB'])){
            $alternativaB = true;
        }
        if(isset($params['checkC'])){
            $alternativaC = true;
        }   
        if(isset($params['checkD'])){
            $alternativaD = true;
        }
        if(isset($params['curso']) == false){
            return $error[]='Selecione um curso!!';
        }
        if(isset($params['disciplina']) == false){
            return $error[]='Selecione uma disciplina!!';
        }
        if($alternativaA == false && $alternativaB == false && $alternativaC == false && $alternativaD == false){
            return $error[]='Selecione uma resposta como válida!!';
        }
        $insert = DB::table('perguntas')
                        ->insert(['criado_por' => $_COOKIE['login'],'texto_pergunta' => $params['pergunta'],'curso' => $params['curso'],'disciplina' => $params['disciplina'], 'texto_resposta_a' => $params['respostaA'], 'texto_resposta_b' => $params['respostaB'], 'texto_resposta_c' => $params['respostaC'], 'texto_resposta_d' => $params['respostaD'], 'alternativa_a' => $alternativaA, 'alternativa_b' => $alternativaB, 'alternativa_c' => $alternativaC, 'alternativa_d' => $alternativaD]);

        if($insert){
            return $error[]='Pergunta cadastrada com sucesso!!';
        }
            
    }
}
