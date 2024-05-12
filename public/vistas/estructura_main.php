<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> <?= $title ?> </title>
    <link rel="icon" href="../img/poke-favicon.png" type="image/png">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&display=swap" rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a id="inicio" href="/home">Home</a><img height=1px width=40px src="../img/spacer.gif" alt=""><a href="/misequipos">My Teams</a></li>
                <li>
                    <input class="redondearbordes" type="text" placeholder="Buscar">
                    <button class="redondearbordes" id="searchBtn"><img width=15px height=15px src="../img/filtro.gif"></button>
                </li>
                <li><a href="/login">Login</a></li>
            </ul>
        </nav>
    </header>
    <main>

        <!--aqui va el menu el footer los styles etc etc -->
        <?= $content ?>

    </main>
    <footer></footer>
    <script src="../js/main.js" type="text/javascript"></script>
    <!-- js para el modal de la ficha -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap JS (incluye Popper.js) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- seguramente en lugar de ser un solo archivo, se metan todos o se gestione con los controladores posteriormente -->
    <script src="../js/ficha-modal-equipos.js" type="text/javascript"></script>
    <script></script>
</body>

</html>