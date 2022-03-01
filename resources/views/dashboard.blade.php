<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>

@if ($_COOKIE['nivelUsuario'] == 0 )
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