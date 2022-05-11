<?php 
    use Illuminate\Support\Facades\DB;
    $cont=1;
    $cursos = DB::select("SELECT * FROM cursos");
    $disciplinas = DB::select("SELECT * FROM disciplinas");
    $pergunta = DB::select("SELECT * FROM perguntas WHERE idPergunta = ?",[$idPergunta]);
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
@if ($_COOKIE['nivelUsuario'] == 3 )
<form id="formCadastro" action="{{ url('/atualizarPergunta') }}" method="post">
        @csrf
        <!-- <div id="campoLogin">
            Nome do curso: <input type="text" name="nome_curso" id="nome_curso"/>
        </div> -->
        <div id="campoCurso">
            Nome do curso: <select id="curso" name="curso" style="margin-left: 0px; max-width: 100px;">
            @foreach($cursos as $curso)
                <option value="<?= $curso->idCurso?>" <?php if($pergunta[0]->idCurso == $curso->idCurso){ echo 'selected';} ?>><?= $curso->nome_curso?></option>
            @endforeach
            </select>
            Nome da disciplina: <select id="disciplina" name="disciplina" style="max-width: 100px;">
            @foreach($disciplinas as $disciplina)
                <option value="<?= $disciplina->idDisciplina?>" <?php if($pergunta[0]->idDisciplina == $disciplina->idDisciplina){ echo 'selected';} ?>><?= $disciplina->nome_disciplina?></option>
            @endforeach
            </select>
        </div>
        <div id="campoPergunta">
            Questão: <textarea rows = "5" cols = "60" name = "pergunta">
            <?= $pergunta[0]->texto_pergunta?>
         </textarea>
        </div> 
        <div>
            <div id="campoRespostaA">
                <input type="radio" name="radio" id="radioA" onchange="a()" <?php if($pergunta[0]->alternativa_a == 1){ echo 'checked="checked" value="A"';} ?>> A) <textarea rows = "3" cols = "60" name = "respostaA" style="margin-left: 35px;">
                <?= $pergunta[0]->texto_resposta_a?>
            </textarea>
            </div>
            <div id="campoRespostaB">
                <input type="radio" name="radio" id="radioB" onchange="b()" <?php if($pergunta[0]->alternativa_b == 1){ echo 'checked="checked" value="B"';} ?>> B) <textarea rows = "3" cols = "60" name = "respostaB" style="margin-left: 35px;">
                <?= $pergunta[0]->texto_resposta_b?>
            </textarea>
            </div>
            <div id="campoRespostaC">
                <input type="radio" name="radio" id="radioC" onchange="c()" <?php if($pergunta[0]->alternativa_c == 1){ echo 'checked="checked" value="C"';} ?>> C) <textarea rows = "3" cols = "60" name = "respostaC" style="margin-left: 35px;">
                <?= $pergunta[0]->texto_resposta_c?>
            </textarea>
            </div>
            <div id="campoRespostaD">
                <input type="radio" name="radio" id="radioD" onchange="d()" <?php if($pergunta[0]->alternativa_d == 1){ echo 'checked="checked" value="D"';} ?>> D) <textarea rows = "3" cols = "60" name = "respostaD" style="margin-left: 35px;">
                <?= $pergunta[0]->texto_resposta_d?>
            </textarea>
            <div id="campoRespostaE">
                <input type="radio" name="radio" id="radioE" onchange="e()" <?php if($pergunta[0]->alternativa_e == 1){ echo 'checked="checked" value="E"';} ?>> E) <textarea rows = "3" cols = "60" name = "respostaE" style="margin-left: 35px;">
                <?= $pergunta[0]->texto_resposta_e?>
            </textarea>
            </div>
        </div>
        <input type="hidden" name="idPergunta" id="idPergunta" value="<?= $idPergunta?>"/>
        <input type="submit" name="submitCurso" id="submitCurso" value="Enviar"/>
</form>
@endif
    
</body>
</html>
<script>
    function a(){
        radioA.setAttribute("value", "A"); 
        document.getElementById("radioB").removeAttribute("value");
        document.getElementById("radioB").removeAttribute("checked");
        document.getElementById("radioC").removeAttribute("value");
        document.getElementById("radioC").removeAttribute("checked");
        document.getElementById("radioD").removeAttribute("value");
        document.getElementById("radioD").removeAttribute("checked");
        document.getElementById("radioE").removeAttribute("value");
        document.getElementById("radioE").removeAttribute("checked");
    }
    function b(){
        radioB.setAttribute("value", "B"); 
        document.getElementById("radioA").removeAttribute("value");
        document.getElementById("radioA").removeAttribute("checked");
        document.getElementById("radioC").removeAttribute("value");
        document.getElementById("radioC").removeAttribute("checked");
        document.getElementById("radioD").removeAttribute("value");
        document.getElementById("radioD").removeAttribute("checked");
        document.getElementById("radioE").removeAttribute("value");
        document.getElementById("radioE").removeAttribute("checked");
    }
    function c(){
        radioC.setAttribute("value", "C"); 
        document.getElementById("radioB").removeAttribute("value");
        document.getElementById("radioB").removeAttribute("checked");
        document.getElementById("radioA").removeAttribute("value");
        document.getElementById("radioA").removeAttribute("checked");
        document.getElementById("radioD").removeAttribute("value");
        document.getElementById("radioD").removeAttribute("checked");
        document.getElementById("radioE").removeAttribute("value");
        document.getElementById("radioE").removeAttribute("checked");
    }
    function d(){
        radioD.setAttribute("value", "D"); 
        document.getElementById("radioB").removeAttribute("value");
        document.getElementById("radioB").removeAttribute("checked");
        document.getElementById("radioC").removeAttribute("value");
        document.getElementById("radioC").removeAttribute("checked");
        document.getElementById("radioA").removeAttribute("value");
        document.getElementById("radioA").removeAttribute("checked");
        document.getElementById("radioE").removeAttribute("value");
        document.getElementById("radioE").removeAttribute("checked");
    }
    function e(){
        radioE.setAttribute("value", "E"); 
        document.getElementById("radioB").removeAttribute("value");
        document.getElementById("radioB").removeAttribute("checked");
        document.getElementById("radioC").removeAttribute("value");
        document.getElementById("radioC").removeAttribute("checked");
        document.getElementById("radioD").removeAttribute("value");
        document.getElementById("radioD").removeAttribute("checked");
        document.getElementById("radioA").removeAttribute("value");
        document.getElementById("radioA").removeAttribute("checked");
    }
</script>