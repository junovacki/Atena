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
        $alternativaE = false;

        if($params['radio'] == 'A'){
            $alternativaA = true;
        }
        if($params['radio'] == 'B'){
            $alternativaB = true;
        }
        if($params['radio'] == 'C'){
            $alternativaC = true;
        }   
        if($params['radio'] == 'D'){
            $alternativaD = true;
        }
        if($params['radio'] == 'E'){
            $alternativaE = true;
        }
        if(isset($params['curso']) == false){
            return $error[]='Selecione um curso!!';
        }
        if(isset($params['disciplina']) == false){
            return $error[]='Selecione uma disciplina!!';
        }
        if($alternativaA == false && $alternativaB == false && $alternativaC == false && $alternativaD == false && $alternativaE == false){
            return $error[]='Selecione uma resposta como válida!!';
        }
        $insert = DB::table('perguntas')
                        ->insert(['criado_por' => $_COOKIE['login'],'texto_pergunta' => $params['pergunta'],'idCurso' => $params['curso'],'idDisciplina' => $params['disciplina'], 'texto_resposta_a' => $params['respostaA'], 'texto_resposta_b' => $params['respostaB'], 'texto_resposta_c' => $params['respostaC'], 'texto_resposta_d' => $params['respostaD'], 'texto_resposta_e' => $params['respostaE'], 'alternativa_a' => $alternativaA, 'alternativa_b' => $alternativaB, 'alternativa_c' => $alternativaC, 'alternativa_d' => $alternativaD, 'alternativa_e' => $alternativaE]);

        if($insert){
            return $error[]='Pergunta cadastrada com sucesso!!';
        }
            
    }
    public function editarPergunta($params)
    {
        
        $alternativaA = false;
        $alternativaB = false;
        $alternativaC = false;
        $alternativaD = false;
        $alternativaE = false;
        if($params['radio'] == 'A'){
            $alternativaA = true;
        }
        if($params['radio'] == 'B'){
            $alternativaB = true;
        }
        if($params['radio'] == 'C'){
            $alternativaC = true;
        }   
        if($params['radio'] == 'D'){
            $alternativaD = true;
        }
        if($params['radio'] == 'E'){
            $alternativaE = true;
        }
        if(isset($params['curso']) == false){
            return $error[]='Selecione um curso!!';
        }
        if(isset($params['disciplina']) == false){
            return $error[]='Selecione uma disciplina!!';
        }
        if($alternativaA == false && $alternativaB == false && $alternativaC == false && $alternativaD == false && $alternativaE == false){
            return $error[]='Selecione uma resposta como válida!!';
        }
        $insert = DB::table('perguntas')
                        ->where('idPergunta', $params['idPergunta'])
                        ->update(['texto_pergunta' => $params['pergunta'],'idCurso' => $params['curso'],'idDisciplina' => $params['disciplina'], 'texto_resposta_a' => $params['respostaA'], 'texto_resposta_b' => $params['respostaB'], 'texto_resposta_c' => $params['respostaC'], 'texto_resposta_d' => $params['respostaD'], 'texto_resposta_e' => $params['respostaE'], 'alternativa_a' => $alternativaA, 'alternativa_b' => $alternativaB, 'alternativa_c' => $alternativaC, 'alternativa_d' => $alternativaD, 'alternativa_e' => $alternativaE]);

        if($insert){
            return $error[]='Pergunta atualizada com sucesso!!';
        }else{
            return $error[]='Altere alguma informação para que a pergunta seja alterada!!';
        }
            
    }
    public function deletaPergunta($idPergunta){
        
        $insert = DB::table('perguntas')
                    
                    ->deletePergunta($idPergunta)
                    ;
        
        echo "<script language='javascript' type='text/javascript'>
        alert('Pergunta deletada com sucesso');
        window.location.href='/dashboard';</script>";
    }
}
