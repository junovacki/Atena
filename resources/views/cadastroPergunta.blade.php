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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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
<form id="formCadastro" action="{{ url('/registrarPergunta') }}" method="post">
        @csrf
        <!-- <div id="campoLogin">
            Nome do curso: <input type="text" name="nome_curso" id="nome_curso"/>
        </div> -->
        <div id="campoCurso">
            Nome do curso: <select id="curso" name="curso" style="margin-left: 0px; max-width: 100px;">
            @foreach($cursos as $curso)
                <option value="<?= $curso->id?>"><?= $curso->nome_curso?></option>
            @endforeach
            </select>
            Nome da disciplina: <select id="disciplina" name="disciplina" style="max-width: 100px;">
            @foreach($disciplinas as $disciplina)
                <option value="<?= $disciplina->id?>"><?= $disciplina->nome_disciplina?></option>
            @endforeach
            </select>
        </div>
        <div id="campoPergunta">
            Pergunta: <textarea rows = "5" cols = "60" name = "pergunta">
            Escreva o texto da pergunta aqui...
         </textarea>
        </div> 
        <div id="campoRespostaA">
            <input type="checkbox" name="checkA"> A) <textarea rows = "3" cols = "60" name = "respostaA" style="margin-left: 35px;">
            Escreva o texto da resposta aqui...
         </textarea>
        </div>
        <div id="campoRespostaB">
            <input type="checkbox" name="checkB"> B) <textarea rows = "3" cols = "60" name = "respostaB" style="margin-left: 35px;">
            Escreva o texto da resposta aqui...
         </textarea>
        </div>
        <div id="campoRespostaC">
            <input type="checkbox" name="checkC"> C) <textarea rows = "3" cols = "60" name = "respostaC" style="margin-left: 35px;">
            Escreva o texto da resposta aqui...
         </textarea>
        </div>
        <div id="campoRespostaD">
            <input type="checkbox" name="checkD"> D) <textarea rows = "3" cols = "60" name = "respostaD" style="margin-left: 35px;">
            Escreva o texto da resposta aqui...
         </textarea>
        </div>
        <input type="submit" name="submitCurso" id="submitCurso" value="Enviar"/>
</form>
@endif
    
</body>
</html>