<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= $title ?> </title>
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="icon" href="../img/poke-favicon.png" type="image/png">
    <!-- seguramente en lugar de ser un solo archivo, se metan todos -->
</head>

<body>
    <main>
        <!--aqui va el menu el footer los styles etc etc -->
        <?= $content ?>

    </main>
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