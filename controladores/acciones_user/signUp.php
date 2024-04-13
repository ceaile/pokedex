<?php
include("../pokedex/conexiones/bbdd/conexionBbdd.php");

// Suponiendo que los parámetros de sesión se obtienen de algún lugar
// Como de $_POST o $_SESSION

try {
    // Obtencion de datos del usuario
    $nuevoUser = $_POST["user"];
    $PassNuevoUser = $_POST["passwd"];
    $confirmPass = $_POST["confirmPasswd"];


    // VALIDACIONES QUE DE MOMENTO NO FUNCIONAN :(
    /*
    $emailIntroducido = $_POST["email"];
    if (!filter_var($emailIntroducido, FILTER_VALIDATE_EMAIL)) {
        $mensajeErrorEmail = "El email introducido no es válido.";
        header("Location: ../signup.php");
        exit();
    }
    
    //validacion de que las contraseñas sean iguales
    if ($PassNuevoUser !== $confirmPass) {
        header("Location: ../signup.php");
        exit();
    }

    //validación de contraseña, por ejemplo si es corta
    $contraseñaIntroducida = $passNuevoUser;
    if (strlen($contraseñaIntroducida) < 4){
        $mensajeError = ("La contraseña introducida es muy corta.");
        header("Location: ../signup.php");
        exit();
    }
    */

    // Preparar la consulta INSERT
    $passwdHasheada = password_hash($PassNuevoUser, PASSWORD_BCRYPT); //hasheo de la contraseña
    $queryPreparada = $conexionBbdd->prepare("INSERT INTO USERS (email, passwd) VALUES (?, ?)");
    $queryPreparada->bindParam(1, $nuevoUser);
    $queryPreparada->bindParam(2, $passwdHasheada);
    $queryPreparada->execute();

    if ($queryPreparada->rowCount() == 1) {
        $conexionBbdd->commit();
        exit();
    } else {
        $conexionBbdd->rollBack();
        exit();
    }
} catch (PDOException $e) {
    $conexionBbdd->rollBack();
    echo "Error en la conexión a la base de datos: " . $e->getMessage();
} catch (Exception $e) {
    $conexionBbdd->rollBack();
    echo "Error general: " . $e->getMessage();
} finally {
    if (isset($conexionBbdd)) {
        $conexionBbdd = null;
    }
}
