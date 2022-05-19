<?php
use Illuminate\Support\Facades\DB;

    $cursos = DB::select("SELECT * FROM cursos");
    $modalidades = DB::select("SELECT * FROM modalidades");
    $categorias = DB::select("SELECT * FROM categorias");
    $turnos = DB::select("SELECT * FROM turnos");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CURSO</title>
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
@if ($_COOKIE['nivelUsuario'] == 1 )
    <form id="formCadastro" action="{{ url('/registrarCurso') }}" method="post">
        @csrf
        <div id="campoLogin">
            Nome do curso: <input type="text" name="nome_curso" id="nome_curso"/>
        </div>
        <div id="campoTipoUsuario">
            Modalidade do curso: <select id="tipoCurso" name="tipoModalidade" style="margin-left: 14px;">
            @foreach($modalidades as $modalidade)
                <option value="<?= $modalidade->idModalidade?>"><?= $modalidade->modalidade?></option>
            @endforeach
            </select>
        </div>
        <div id="campoTipoUsuario">
            Categoria do curso: <select id="tipoCurso" name="tipoCategoria" style="margin-left: 14px;">
            @foreach($categorias as $categoria)
                <option value="<?= $categoria->idCategoria?>"><?= $categoria->categoria?></option>
            @endforeach
            </select>
        </div>
        <div id="campoTipoUsuario">
            Turno do curso: <select id="tipoCurso" name="tipoTurno" style="margin-left: 14px;">
            @foreach($turnos as $turno)
                <option value="<?= $turno->idTurno?>"><?= $turno->turno?></option>
            @endforeach
            </select>
        </div>
        <input type="submit" name="submitCurso" id="submitCurso" value="Enviar"/>
    </form>
@endif
    
</body>
</html>