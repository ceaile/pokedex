<?php
namespace conexiones\bbdd;
//use Router\enrutador;
use PDO;
use conexiones\bbdd\ConfigBbdd;
use Exception;

class Bbdd{
  public PDO $conexionBbdd;

  public function __construct()
  { 
    $nombreConexion = ConfigBbdd::$dbms .":host=". ConfigBbdd::$host .";port". ConfigBbdd::$port . ";dbname=". ConfigBbdd::$db_name;
    $this->conexionBbdd = new PDO($nombreConexion, ConfigBbdd::$user, ConfigBbdd::$password);
    $this->conexionBbdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //autogenerado
    
  }
}