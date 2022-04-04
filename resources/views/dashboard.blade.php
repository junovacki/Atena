<?php
use Illuminate\Support\Facades\DB;

    $usuarios = DB::select("SELECT * FROM users");
    foreach($usuarios as $user){
        switch ($user->nivelAcesso){
            case 0:
                $user->nivelAcesso='Administrador';
                break;
            case 1:
                $user->nivelAcesso='Coordenador';
                break;
            case 2:
                $user->nivelAcesso='Professor';
                break;
        }
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
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
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
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($usuarios as $user)
                                        <tr>
                                            <td><?= $user->user?></td>
                                            <td><?= $user->nivelAcesso?></td>
                                            <td>
                                                <a href="#" id="view" class="button">
                                                    <i class="fa fa-eye fa-lg fa-align-center" aria-hidden="true"></i>
                                                </a> 
                                                <a href="#" id="view" class="button">
                                                    <i class="fa fa-solid fa-ban " ></i>
                                                </a>    
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

@if ($_COOKIE['nivelUsuario'] == 1 )
    <h1>
        <marquee>COORDENADOR <?=$_COOKIE['login']?> TA ON</marquee>
    </h1>
@endif

@if ($_COOKIE['nivelUsuario'] == 2 )
    <div id="botaoCadUsuario">
        <a href="/cadastroPergunta">Cadastro de pergunta</a>
    </div>
    <h1>
        <marquee>PROFESSOR <?=$_COOKIE['login']?> TA ON</marquee>
    </h1>
@endif



    
</body>
</html>