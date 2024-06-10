<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title ?></title>
    <link rel="icon" href="../img/poke-favicon.png" type="image/png">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&display=swap" rel="stylesheet">
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <img src="../img/abrir_2.gif">
    </div>

    <header>
        <nav>
            <ul>
            <li>
            <a id="inicio" href="/home">Home</a>
            <a href="/myteams">
                <?php if (isset($_SESSION['username'])) : ?>
                    <?php echo $_SESSION['username'] . "'s Teams"; ?>
                <?php else : ?>
                    My Teams
                <?php endif; ?>
            </a>
        </li>

        <li>
    <ul class="navbar">
        <!-- Otros elementos de la barra de navegación -->
        <li class="search-container">
            <form action="search" method="GET" class="search-form">
                <input type="text" name="search" placeholder="Search Pokémon" class="search-input">
                <input type="submit" value="Search" class="search-button">
            </form>
        </li>
    </ul>

                <?php if (!isset($_SESSION['username'])) { ?>
                    <li><a href="/login">Login</a></li>
                <?php } else if (isset($_SESSION['username'])) { ?>
                    <li><a style="background-color:#FFAA00;border-radius:20px;padding: 10px; text-decoration: none;" href="/logout">Logout</a></li>
                <?php } ?>
            </ul>
        </nav>
    </header>
    <main>
        <?= $content ?>
        <img src="../img/fondo_transp.png" alt="Background Image" class="background-image">
    </main>
    <footer></footer>

    <script src="../js/main.js" type="text/javascript"></script>

</body>

</html>