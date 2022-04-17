<?php
use Illuminate\Support\Facades\DB;

    $curso = DB::select("SELECT * FROM cursos where id = ?", [$idCurso]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR CURSO</title>
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
    <form id="formCadastro" action="{{ url('/atualizarCurso') }}" method="post">
        @csrf
        <div id="campoLogin">
            Nome Curso: <input type="text" name="nomeCurso" id="login" value="<?= $curso[0]->nome_curso ?>"/>
        </div>
        <div id="campoTipoUsuario">
            Tipo do curso: <select id="tipoUsuario" name="tipoCurso">
                <option value="0" <?php if($curso[0]->tipo_curso == '0'){echo "selected";} ?>>Tecnologia</option>
                <option value="1" <?php if($curso[0]->tipo_curso == '1'){echo "selected";} ?>>Saúde</option>
                <option value="2" <?php if($curso[0]->tipo_curso == '2'){echo "selected";} ?>>Exatas</option>
                <option value="3" <?php if($curso[0]->tipo_curso == '3'){echo "selected";} ?>>Humanas</option>
            </select>
        </div>
        <input type="hidden" value="<?= $curso[0]->id?>" name="idCurso" id="idUsuario"/>
        <input type="submit" name="submitUsuario" id="submitUsuario" value="Enviar"/>
    </form>
    @endif
</body>
</html>