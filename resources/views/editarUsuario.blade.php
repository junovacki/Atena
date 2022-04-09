<?php
use Illuminate\Support\Facades\DB;

    $usuario = DB::select("SELECT * FROM users where id = ?", [$idUsuario]);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR USUÁRIO</title>
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
    <form id="formCadastro" action="{{ url('/atualizarUsuario') }}" method="post">
        @csrf
        <div id="campoLogin">
            Login: <input type="text" name="login" id="login" value="<?= $usuario[0]->user ?>"/>
        </div>
        <div id="campoSenha">
            Senha: <input type="password" name="senha" id="senha" value="<?= $usuario[0]->password ?>"/>
        </div>
        <div id="campoTipoUsuario">
            Tipo de usuário: <select id="tipoUsuario" name="tipoUsuario">
                <option value="0" <?php if($usuario[0]->nivelAcesso == '0'){echo "selected";} ?>>Administrador/Secreteria</option>
                <option value="1" <?php if($usuario[0]->nivelAcesso == '1'){echo "selected";} ?>>Coordenador</option>
                <option value="2" <?php if($usuario[0]->nivelAcesso == '2'){echo "selected";} ?>>Professor</option>
            </select>
        </div>
        <input type="hidden" value="<?= $usuario[0]->id?>" name="idUsuario" id="idUsuario"/>
        <input type="submit" name="submitUsuario" id="submitUsuario" value="Enviar"/>
    </form>
    @endif
</body>
</html>