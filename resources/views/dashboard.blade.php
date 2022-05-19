<?php
use Illuminate\Support\Facades\DB;

    if($_COOKIE['nivelUsuario'] == 1){
        $usuarios = DB::select("SELECT * FROM users");
        $disciplinas = DB::select("SELECT * FROM disciplinas");
        $cursos = DB::select("SELECT * FROM cursos 
                        INNER JOIN categorias ON cursos.idCategoria=categorias.idCategoria
                        INNER JOIN modalidades ON cursos.idModalidade=modalidades.idModalidade
                        INNER JOIN turnos ON cursos.idTurno=turnos.idTurno
                        ");
        foreach($usuarios as $user){
            switch ($user->nivelAcesso){
                case 1:
                    $user->nivelAcesso='Administrador';
                    break;
                case 2:
                    $user->nivelAcesso='Coordenador';
                    break;
                case 3:
                    $user->nivelAcesso='Professor';
                    break;
            }
        }
    }
    if($_COOKIE['nivelUsuario'] == 3){
        $perguntas = DB::select("SELECT * FROM perguntas WHERE criado_por = ?", [$_COOKIE['login']]);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body id="body">
    <div id="botaoSair" style="position: absolute; top: 8px; right:16px;">
        <a href="/">Sair</a>
    </div>
@if ($_COOKIE['nivelUsuario'] == 1 )
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
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex">
                <div class="col-lg-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Usuários Cadastrados</h4>
                            <p class="card-description"> Todos os usuários cadastrados </p>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Usuário</th>
                                            <th>Tipo</th>
                                            <th>AÇÃO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($usuarios as $user)
                                        <tr>
                                            <td><?= $user->user?></td>
                                            <td><?= $user->nivelAcesso?></td>
                                            <td>
                                                <a href="editarUsuario/<?= $user->idUser ?>" id="view" class="button">
                                                    <i class="fa fa-eye fa-lg fa-align-center" aria-hidden="true"></i>
                                                </a> 
                                                <button type="button" class="button" id="view"  onclick="deletarUsuario(<?= $user->idUser?>)">
                                                    <i class="fa fa-solid fa-ban " ></i>
                                                </button>    
                                            </td>
                                        </tr>
                                        
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="col-lg-8 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Cursos Cadastrados</h4>
                            <p class="card-description"> Todos os cursos cadastrados </p>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Categoria</th>
                                            <th>Modalidade</th>
                                            <th>Turno</th>
                                            <th>AÇÃO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cursos as $curso)
                                        <tr>
                                            <td><?= $curso->nome_curso?></td>
                                            <td><?= $curso->categoria?></td>
                                            <td><?= $curso->modalidade?></td>
                                            <td><?= $curso->turno?></td>
                                            <td>
                                                <a href="editarCurso/<?= $curso->idCurso ?>" id="view" class="button">
                                                    <i class="fa fa-eye fa-lg fa-align-center" aria-hidden="true"></i>
                                                </a> 
                                                <button type="button" class="button" id="view"  onclick="deletarCurso(<?= $curso->idCurso?>)">
                                                    <i class="fa fa-solid fa-ban " ></i>
                                                </button>    
                                            </td>
                                        </tr>
                                        
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <br>
                <div class="col-lg-4 grid-margin stretch-card" style="padding-top: 30px;">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Disciplinas Cadastradas</h4>
                            <p class="card-description"> Todas as disciplinas cadastradas </p>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>AÇÃO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($disciplinas as $disciplina)
                                        <tr>
                                            <td><?= $disciplina->nome_disciplina?></td>
                                            <td>
                                                <a href="editarDisciplina/<?= $disciplina->idDisciplina ?>" id="view" class="button">
                                                    <i class="fa fa-eye fa-lg fa-align-center" aria-hidden="true"></i>
                                                </a> 
                                                <button type="button" class="button" id="view"  onclick="deletarDisciplina(<?= $disciplina->idDisciplina?>)">
                                                    <i class="fa fa-solid fa-ban " ></i>
                                                </button>    
                                            </td>
                                        </tr>
                                        
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
    </div>
    
@endif

@if ($_COOKIE['nivelUsuario'] == 2 )
    <h1>
        <marquee>COORDENADOR <?=$_COOKIE['login']?> TA ON</marquee>
    </h1>
@endif

@if ($_COOKIE['nivelUsuario'] == 3 )
    <div id="botaoCadUsuario">
        <a href="/cadastroPergunta">Cadastro de pergunta</a>
    </div>
    <h1>
        <marquee>PROFESSOR <?=$_COOKIE['login']?> TA ON</marquee>
    </h1>
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex">
                <div class="col-lg-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Perguntas Cadastradas</h4>
                            <p class="card-description"> Todas as perguntas cadastradas por você </p>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>TEXTO</th>
                                            <th>AÇÃO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($perguntas as $pergunta)
                                        <tr>
                                            <td class="content_td"><p><?= $pergunta->texto_pergunta?></p></td>
                                            <td>
                                                <a href="editarPergunta/<?= $pergunta->idPergunta ?>" id="view" class="button">
                                                    <i class="fa fa-eye fa-lg fa-align-center" aria-hidden="true"></i>
                                                </a> 
                                                <button type="button" class="button" id="view"  onclick="deletarPergunta(<?= $pergunta->idPergunta?>)">
                                                    <i class="fa fa-solid fa-ban " ></i>
                                                </button>    
                                            </td>
                                        </tr>
                                        
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
    </div>
@endif

<script>
    function deletarUsuario(id) {
    let text = "Deseja realmente deletar o usuário?";
    if (confirm(text) == true) {
        window.location.href='deletarUsuario/'+id;
    } 
    }
    function deletarCurso(id) {
    let text = "Deseja realmente deletar o curso?";
    if (confirm(text) == true) {
        window.location.href='deletarCurso/'+id;
    } 
    }
    function deletarDisciplina(id) {
    let text = "Deseja realmente deletar a disciplina?";
    if (confirm(text) == true) {
        window.location.href='deletarDisciplina/'+id;
    } 
    }
    function deletarPergunta(id) {
    let text = "Deseja realmente deletar a pergunta?";
    if (confirm(text) == true) {
        window.location.href='deletarPergunta/'+id;
    } 
    }
</script>
    
</body>
</html>