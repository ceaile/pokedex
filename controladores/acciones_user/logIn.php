<?php
include("../pokedex/conexiones/bbdd/conexionBbdd.php");

// Suponiendo que los parámetros de sesión se obtienen de algún lugar
// Como de $_POST o $_SESSION

try {
    // Obtencion de datos del usuario y primer hasheo de la contraseña
    $nombreUsuario = $_SESSION['user'];
    $passUsuario = $_SESSION['passwd'];
    $hashedPasswd = password_hash($passUsuario, PASSWORD_BCRYPT);

    $conexionBbdd->beginTransaction();
    $loginQuery = $conexionBbdd->prepare("SELECT password FROM users WHERE username = :username");
    // Bindeo del parametro para mayor seguridad
    $loginQuery->bindParam(':username', $nombreUsuario, PDO::PARAM_STR);
    $loginQuery->execute();

    /*  
    $FilaResultado es un array asociativo. 
    en un array, al compararlo de forma booleana, 
    responde como true si tiene algun valor dentro
    y false si está vacío.
    Si lo comparas a null dara true con == y false con ===. Ejemplo:
        $row = [
        'id' => 1,
        'username' => 'juan',
        'password' => '$2y$10$E5PO4R4fg1KLcWxwFWzIRu1l5A8DghCBfzNciV0RHtjPyE2.QwV3a' ];
    */

    // Obtener la contraseña hasheada de la base de datos
    $FilaResultado = $loginQuery->fetch(PDO::FETCH_ASSOC);
    $contrasenaHasheadaDeBbdd = $FilaResultado['password'];

    // Verificacion de existencia de user y de contraseña para mayor seguridad
    if ($FilaResultado) {
        $contrasenaHasheadaDeBbdd = $FilaResultado['password'];
        if ($contrasenaHasheadaDeBbdd && password_verify($passUsuario, $contrasenaHasheadaDeBbdd)) {
        } else {
            die("Nombre de usuario o contraseña incorrectos.");
        }
    }
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}
