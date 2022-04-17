<?php
use Illuminate\Support\Facades\DB;

    $disciplina = DB::select("SELECT * FROM disciplinas where id = ?", [$idDisciplina]);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR DISCIPLINA</title>
    <link rel="stylesheet" href="{{ asset('css/cadastroUsuario.css') }}">
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
    @if ($_COOKIE['nivelUsuario'] == 0 )
    <form id="formCadastro" action="{{ url('/atualizarDisciplina') }}" method="post">
        @csrf
        <div id="campoLogin">
            Nome da disciplina: <input type="text" name="nomeDisciplina" id="login" value="<?= $disciplina[0]->nome_disciplina ?>"/>
        </div>
        <input type="hidden" value="<?= $disciplina[0]->id?>" name="idDisciplina" id="idDisciplina"/>
        <input type="submit" name="submitUsuario" id="submitUsuario" value="Enviar"/>
    </form>
    @endif
</body>
</html>