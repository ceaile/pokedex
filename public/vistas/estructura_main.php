<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title ?></title>
    <link rel="icon" href="../img/poke-favicon.png" type="image/png">
    <!-- hojas de estilo en orden!!! no cambiar -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/forms.css">
    <link rel="stylesheet" href="../css/modales.css">
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <!-- <img src="../img/abrirrrr_2.gif"> ya no necesario -->
    </div>

    <div class="wrapper">
        <header>
            <nav class="navbar">
                <div class="navbar-left">
                    <a id="inicio" href="/home" class="link-navegacion">Home</a>
                    <a href="/myteams" class="link-navegacion">
                        <?php if (isset($_SESSION['username'])) : ?>
                            <?= $_SESSION['username'] . "'s Teams"; ?>
                        <?php else : ?>
                            My Teams
                        <?php endif; ?>
                    </a>
                </div>
                <div class="navbar-center">
                    <form action="search" method="GET" class="search-form">
                        <input type="text" name="search" placeholder="search by name, ID, type..." class="search-input">
                        <input type="submit" value="Search" class="search-button">
                    </form>
                </div>
                <div class="navbar-right">
                    <?php if (!isset($_SESSION['username'])) { ?>
                        <a href="/login" class="link-login">Login</a>
                    <?php } else if (isset($_SESSION['username'])) { ?>
                        <a href="/logout" class="link-login">Logout</a>
                    <?php } ?> <!-- burger -->
                    <button class="hamburger-menu" id="hamburger-menu">&#9776;</button>
                </div>
                <div class="mobile-menu" id="mobile-menu">
                    <a href="/home" class="nav-link">Home</a>
                    <a href="/myteams" class="nav-link">Teams</a>
                    <form action="search" method="GET" class="search-form">
                        <input type="text" name="search" placeholder="search by name, ID, type..." class="search-input">
                        <input type="submit" value="Search" class="search-button">
                    </form>
                    <?php if (!isset($_SESSION['username'])) { ?>
                        <a href="/login" class="nav-link">Login</a>
                    <?php } else if (isset($_SESSION['username'])) { ?>
                        <a href="/logout" class="nav-link">Logout</a>
                    <?php } ?>
                </div><!-- .burger -->
            </nav>
        </header>
        <main class="container">
            <?= $content ?>
            <img src="../img/foto_inexistente.png" alt="Background Image" class="background-image">
        </main>
        <footer class="footer"></footer>
    </div>
    
    <script src="../js/efecto-ajedrez.js" type="text/javascript"></script>
    <script src="../js/main.js" type="text/javascript"></script>
</body>

</html>
