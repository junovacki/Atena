<?php
use Illuminate\Support\Facades\DB;

    $curso = DB::select("SELECT * FROM cursos 
                        INNER JOIN categorias ON cursos.idCategoria=categorias.idCategoria
                        INNER JOIN modalidades ON cursos.idModalidade=modalidades.idModalidade
                        INNER JOIN turnos ON cursos.idTurno=turnos.idTurno
                        where idCurso = ?", [$idCurso]);

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
    @if ($_COOKIE['nivelUsuario'] == 1 )
    <form id="formCadastro" action="{{ url('/atualizarCurso') }}" method="post">
        @csrf
        @foreach($curso as $cursos)
        <div id="campoLogin">
            Nome Curso: <input type="text" name="nomeCurso" id="login" value="<?= $cursos->nome_curso ?>"/>
        </div>
        <div id="campoTipoUsuario">
            Modalidade do curso: <select id="tipoCurso" name="tipoModalidade" style="margin-left: 14px;">
            @foreach($modalidades as $modalidade)
                <option value="<?= $modalidade->idModalidade?>" <?php if($cursos->idModalidade == $modalidade->idModalidade){echo "selected";} ?>><?= $modalidade->modalidade?></option>
            @endforeach
            </select>
        </div>
        <div id="campoTipoUsuario">
            Categoria do curso: <select id="tipoCurso" name="tipoCategoria" style="margin-left: 14px;">
            @foreach($categorias as $categoria)
                <option value="<?= $categoria->idCategoria?>" <?php if($cursos->idCategoria == $categoria->idCategoria){echo "selected";} ?>><?= $categoria->categoria?></option>
            @endforeach
            </select>
        </div>
        <div id="campoTipoUsuario">
            Turno do curso: <select id="tipoCurso" name="tipoTurno" style="margin-left: 14px;">
            @foreach($turnos as $turno)
                <option value="<?= $turno->idTurno?>" <?php if($cursos->idTurno == $turno->idTurno){echo "selected";} ?>><?= $turno->turno?></option>
            @endforeach
            </select>
        </div>
        @endforeach
        <input type="hidden" value="<?= $curso[0]->idCurso?>" name="idCurso" id="idUsuario"/>
        <input type="submit" name="submitCurso" id="submitCurso" value="Enviar"/>
    </form>
    @endif
</body>
</html>