<?php 
    use Illuminate\Support\Facades\DB;
    $cont=1;
    $cursos = DB::select("SELECT * FROM cursos");
    $disciplinas = DB::select("SELECT * FROM disciplinas");
    $pergunta = DB::select("SELECT * FROM perguntas WHERE id = ?",[$idPergunta]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/cadastroPerguntas.css') }}">
    
    <title>PERGUNTAS</title>
</head>
<body id="body">
<div id="botaoVoltar">
        <a href="/dashboard">Voltar</a>
    </div>
@if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
@endif
@if ($_COOKIE['nivelUsuario'] == 2 )
<form id="formCadastro" action="{{ url('/atualizarPergunta') }}" method="post">
        @csrf
        <!-- <div id="campoLogin">
            Nome do curso: <input type="text" name="nome_curso" id="nome_curso"/>
        </div> -->
        <div id="campoCurso">
            Nome do curso: <select id="curso" name="curso" style="margin-left: 0px; max-width: 100px;">
            @foreach($cursos as $curso)
                <option value="<?= $curso->id?>" <?php if($pergunta[0]->curso == $curso->id){ echo 'selected';} ?>><?= $curso->nome_curso?></option>
            @endforeach
            </select>
            Nome da disciplina: <select id="disciplina" name="disciplina" style="max-width: 100px;">
            @foreach($disciplinas as $disciplina)
                <option value="<?= $disciplina->id?>" <?php if($pergunta[0]->disciplina == $disciplina->id){ echo 'selected';} ?>><?= $disciplina->nome_disciplina?></option>
            @endforeach
            </select>
        </div>
        <div id="campoPergunta">
            Pergunta: <textarea rows = "5" cols = "60" name = "pergunta">
            <?= $pergunta[0]->texto_pergunta?>
         </textarea>
        </div> 
        <div id="campoRespostaA">
            <input type="checkbox" name="checkA" <?php if($pergunta[0]->alternativa_a == 1){ echo 'checked="checked"';} ?>> A) <textarea rows = "3" cols = "60" name = "respostaA" style="margin-left: 35px;">
            <?= $pergunta[0]->texto_resposta_a?>
         </textarea>
        </div>
        <div id="campoRespostaB">
            <input type="checkbox" name="checkB" <?php if($pergunta[0]->alternativa_b == 1){ echo 'checked="checked"';} ?>> B) <textarea rows = "3" cols = "60" name = "respostaB" style="margin-left: 35px;">
            <?= $pergunta[0]->texto_resposta_b?>
         </textarea>
        </div>
        <div id="campoRespostaC">
            <input type="checkbox" name="checkC" <?php if($pergunta[0]->alternativa_c == 1){ echo 'checked="checked"';} ?>> C) <textarea rows = "3" cols = "60" name = "respostaC" style="margin-left: 35px;">
            <?= $pergunta[0]->texto_resposta_c?>
         </textarea>
        </div>
        <div id="campoRespostaD">
            <input type="checkbox" name="checkD" <?php if($pergunta[0]->alternativa_d == 1){ echo 'checked="checked"';} ?>> D) <textarea rows = "3" cols = "60" name = "respostaD" style="margin-left: 35px;">
            <?= $pergunta[0]->texto_resposta_d?>
         </textarea>
        </div>
        <input type="hidden" name="idPergunta" id="idPergunta" value="<?= $idPergunta?>"/>
        <input type="submit" name="submitCurso" id="submitCurso" value="Enviar"/>
</form>
@endif
    
</body>
</html>