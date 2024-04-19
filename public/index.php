<?php

//Añadimos el Autoload
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . DIRECTORY_SEPARATOR . 'Autoload.php');
Autoload::register();


use Router\Enrutador;
use Controladores\HomeController; //se usan todos los controladores necesarios
use Controladores\LoginController;

//Cargamos las rutas que vamos a usar
$router = new Enrutador(); //se pasa a los metodos estaticos

/*
El primer argumento del get de abajo es la ruta que el user pone y adonde le lleva
lo siguiente es el controlador que va a manejar la pag que quieres.
el segundo arg del array es el nombre del metodo
ese metodo por dentro tiene el renderView() del archivo html o php que es la pag en si
o sea aqui no se pone por ningun lado la pag en si que quieres que cargue
aunque muchas veces se le pone el mismo nombre al metodo y a la pag, entonces puede parecerlo
Ejemplos:
$router->get('/', [PrincipalController::class, '']);
$router->get('/lista', [PrincipalController::class, 'lista']);
*/

$router->get('/', [HomeController::class, 'home']); //este va a ser de verdad
$router->get('/login', [LoginController::class, 'mostrarLogin']);
$router->post('/logear', [LoginController::class, 'logear']);
$router->resolve();

