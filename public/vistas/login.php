<?php

use Controladores\LoginController;
use Router\Enrutador;
//no se si require o require once, porque como el form se envia a si mismo...
require_once 'controladores/LoginController.php'; // Asegúrate de que la ruta sea correcta

//no se por que me da que hacer esto es una aberracion:
$controlador = new LoginController();
$router = new Enrutador();

if ($_SERVER['REQUEST_METHOD'] === 'POST') { // si el formulario se ha enviado
    $controlador->Logear($router);
} else { //si el user no existe y no pudo iniciar sesion
    $controlador->mostrarLogin($router);
}

?>


<!-- form temporal sin estilos ni nada 
tengo que ver como implementar la estructura_main (antiguo layout)
y si hay que modificar el index.php y alguna cosa mas
-->
<form method="POST" action="login.php">
    <label for="username">Nombre de usuario:</label><br>
    <input type="text" id="username" name="username"><br>
    <label for="password">Contraseña:</label><br>
    <input type="password" id="password" name="password"><br>
    <input type="submit" value="Iniciar sesión">
</form>