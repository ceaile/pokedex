
<?php


$nombreConexion = "mysql:host=127.0.0.1;dbname=pokedex";
$usuarioBbdd = "root";
$passBbdd = "";
//conexion propiamente dicha

try {
    $conexionBbdd = new PDO($nombreConexion, $usuarioBbdd, $passBbdd);
    //$conexionBbdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //autogenerado
} catch(PDOException $e) {
    die($e->getMessage());
}
