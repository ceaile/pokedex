<?php

//Añadimos el Autoload
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . DIRECTORY_SEPARATOR . 'Autoload.php');
Autoload::register();

//Añadimos los espacios de nombres a utilizar
use Router\Enrutador;
use Controladores\PrincipalController;

//Cargamos las rutas que vamos a usar
$router = new Enrutador();
$router->get('/', [PrincipalController::class, 'index']);
$router->get('/lista', [PrincipalController::class, 'lista']);
$router->resolve();

?>