<?php
//use conexiones\bbdd\conexionBbdd;
require "../../conexiones/bbdd/conexionBbdd.php";

//namespace - use

$SESSION['username'] = 'userTest';




$query = "SELECT * FROM usuario;";
$st = $conexionBbdd->prepare($query);
$st->execute();
$result = $st->fetch(PDO::FETCH_ASSOC);
print_r($result);
/*
namespace public\vistas;
use modelos\Usuario;

$user1 = new Usuario("nombreUser1", "contrasena1");
echo "<h2>El user se llama" . $user1->getUsername() . " y su contraseña es " . $user1->getPassword() . "</h2>";
*/