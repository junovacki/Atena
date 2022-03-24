<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body id="body">
    <div id="botaoSair" style="position: absolute; top: 8px; right:16px;">
        <a href="/">Sair</a>
    </div>
@if ($_COOKIE['nivelUsuario'] == 0 )
    <div id="botaoCadUsuario">
        <a href="/cadastroUsuario">Cadastro de usuário</a>
    </div>
    <div id="botaoCadUsuario">
        <a href="/cadastroCurso">Cadastro de curso</a>
    </div>
    <div id="botaoCadUsuario">
        <a href="/cadastroDisciplina">Cadastro de disciplina</a>
    </div>
    
    <h1>
        <marquee>ADM <?=$_COOKIE['login']?> TA ON</marquee>
    </h1>
@endif

@if ($_COOKIE['nivelUsuario'] == 1 )
    <h1>
        <marquee>COORDENADOR <?=$_COOKIE['login']?> TA ON</marquee>
    </h1>
@endif



    
</body>
</html>