<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DISCIPLINA</title>
    <link rel="stylesheet" href="{{ asset('css/cadastroUsuario.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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
    <form id="formCadastro" action="{{ url('/registrarDisciplina') }}" method="post">
        @csrf
        <div id="campoLogin">
            Nome da disciplina: <input type="text" name="nome_disciplina" id="nome_disciplina"/>
        </div>
    
        <input type="submit" name="submitCurso" id="submitCurso" value="Enviar"/>
    </form>
@endif
    
</body>
</html>