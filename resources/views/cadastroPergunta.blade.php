<?php 
    use Illuminate\Support\Facades\DB;
    $cont=1;
    $cursos = DB::select("SELECT * FROM cursos");
    $disciplinas = DB::select("SELECT * FROM disciplinas");
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
<form id="formCadastro" action="{{ url('/registrarPergunta') }}" method="post">
        @csrf
        <!-- <div id="campoLogin">
            Nome do curso: <input type="text" name="nome_curso" id="nome_curso"/>
        </div> -->
        <div id="campoCurso">
            Nome do curso: <select id="curso" name="curso" style="margin-left: 0px; max-width: 100px;">
            @foreach($cursos as $curso)
                <option value="<?= $curso->idCurso?>"><?= $curso->nome_curso?></option>
            @endforeach
            </select>
            Nome da disciplina: <select id="disciplina" name="disciplina" style="max-width: 100px;">
            @foreach($disciplinas as $disciplina)
                <option value="<?= $disciplina->idDisciplina?>"><?= $disciplina->nome_disciplina?></option>
            @endforeach
            </select>
        </div>
        <div id="campoPergunta">
            Questão: <textarea rows = "5" cols = "60" name = "pergunta">
            Escreva o texto da pergunta aqui...
         </textarea>
        </div> 
        <div>
            <div id="campoRespostaA">
                <input type="radio" name="radio" id="radioA" onchange="a()"> A) <textarea rows = "3" cols = "60" name = "respostaA" style="margin-left: 35px;">
                Escreva o texto da resposta aqui...
            </textarea>
            </div>
            <div id="campoRespostaB">
                <input type="radio" name="radio" id="radioB" onchange="b()"> B) <textarea rows = "3" cols = "60" name = "respostaB" style="margin-left: 35px;">
                Escreva o texto da resposta aqui...
            </textarea>
            </div>
            <div id="campoRespostaC">
                <input type="radio" name="radio" id="radioC" onchange="c()"> C) <textarea rows = "3" cols = "60" name = "respostaC" style="margin-left: 35px;">
                Escreva o texto da resposta aqui...
            </textarea>
            </div>
            <div id="campoRespostaD">
                <input type="radio" name="radio" id="radioD" onchange="d()"> D) <textarea rows = "3" cols = "60" name = "respostaD" style="margin-left: 35px;">
                Escreva o texto da resposta aqui...
            </textarea>
            <div id="campoRespostaE">
                <input type="radio" name="radio" id="radioE" onchange="e()"> E) <textarea rows = "3" cols = "60" name = "respostaE" style="margin-left: 35px;">
                Escreva o texto da resposta aqui...
            </textarea>
            </div>
        </div>
        <input type="submit" name="submitCurso" id="submitCurso" value="Enviar"/>
</form>
@endif
    
</body>
</html>
<script>
    function a(){
        radioA.setAttribute("value", "A"); 
        document.getElementById("radioB").removeAttribute("value");
        document.getElementById("radioC").removeAttribute("value");
        document.getElementById("radioD").removeAttribute("value");
        document.getElementById("radioE").removeAttribute("value");
    }
    function b(){
        radioB.setAttribute("value", "B"); 
        document.getElementById("radioA").removeAttribute("value");
        document.getElementById("radioC").removeAttribute("value");
        document.getElementById("radioD").removeAttribute("value");
        document.getElementById("radioE").removeAttribute("value");
    }
    function c(){
        radioC.setAttribute("value", "C"); 
        document.getElementById("radioB").removeAttribute("value");
        document.getElementById("radioA").removeAttribute("value");
        document.getElementById("radioD").removeAttribute("value");
        document.getElementById("radioE").removeAttribute("value");
    }
    function d(){
        radioD.setAttribute("value", "D"); 
        document.getElementById("radioB").removeAttribute("value");
        document.getElementById("radioC").removeAttribute("value");
        document.getElementById("radioA").removeAttribute("value");
        document.getElementById("radioE").removeAttribute("value");
    }
    function e(){
        radioE.setAttribute("value", "E"); 
        document.getElementById("radioB").removeAttribute("value");
        document.getElementById("radioC").removeAttribute("value");
        document.getElementById("radioD").removeAttribute("value");
        document.getElementById("radioA").removeAttribute("value");
    }
</script>