<?php
namespace conexiones\bbdd;
/*
$nombreConexion = "mysql:host=127.0.0.1;dbname=pokedex";
$usuarioBbdd = "root";
$passBbdd = "";
//conexion propiamente dicha

try {
    $conexionBbdd = new PDO($nombreConexion, $usuarioBbdd, $passBbdd);
    $conexionBbdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //autogenerado
} catch(PDOException $e) {
    die($e->getMessage());
}
*/

class ConfigBbdd
{
  public static $db_name = "pokedex";
  public static $user = "root";
  public static $password = "";
  public static $port = "3306";
  public static $dbms = "mysql";
  public static $host = "localhost";
}