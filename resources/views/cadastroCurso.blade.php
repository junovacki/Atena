<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CURSO</title>
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
    <form id="formCadastro" action="{{ url('/registrarCurso') }}" method="post">
        @csrf
        <div id="campoLogin">
            Nome do curso: <input type="text" name="nome_curso" id="nome_curso"/>
        </div>
        <div id="campoTipoUsuario">
            Tipo do curso: <select id="tipoCurso" name="tipoCurso" style="margin-left: 14px;">
                <option value="0">Tecnologia</option>
                <option value="1">Saúde</option>
                <option value="2">Exatas</option>
                <option value="3">Humanas</option>
            </select>
        </div>
        <input type="submit" name="submitCurso" id="submitCurso" value="Enviar"/>
    </form>
@endif
    
</body>
</html>