<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Usuário</title>
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
    <form id="formCadastro" action="{{ url('/registrarUsuario') }}" method="post">
        @csrf
        <div id="campoLogin">
            Login: <input type="text" name="login" id="login"/>
        </div>
        <div id="campoSenha">
            Senha: <input type="password" name="senha" id="senha"/>
        </div>
        <div id="campoTipoUsuario">
            Tipo de usuário: <select id="tipoUsuario" name="tipoUsuario">
                <option value="0">Administrador/Secreteria</option>
                <option value="1">Coordenador</option>
                <option value="2">Professor</option>
            </select>
        </div>
        <input type="submit" name="submitUsuario" id="submitUsuario" value="Enviar"/>
    </form>
    @endif
    
</body>
</html>