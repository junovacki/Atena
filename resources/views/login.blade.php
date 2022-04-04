<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body id="body">
@if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
@endif
<form action="{{ url('/login') }}" method="post" id="formLogin">
    @csrf
    <div id="campoLogin">
        Login: <input type="text" id="usuarioLogin" name="usuarioLogin" />
    </div>
    <div id="campoSenha">
        Senha: <input type="password" id="senhaLogin" name="senhaLogin" />
    </div>
    <div id="botaoLogin">
        <input type="submit" value="Login" name="login" id="login" />
    </div>
    
</form>
    
</body>
</html>