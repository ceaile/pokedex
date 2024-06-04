<?php
//Añadimos el Autoload - no tocarrrr
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . DIRECTORY_SEPARATOR . 'Autoload.php');
Autoload::register();


use Router\Enrutador;
use Controladores\HomeController;
use Controladores\LoginController;
use Controladores\SignupController;
use Controladores\EquiposController;
use Controladores\FichaController;
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

$router->get('/', [HomeController::class, 'home']);
$router->get('/home', [HomeController::class, 'home']);
$router->get('/404', [HomeController::class, 'notFound']);

$router->get('/myteams', [EquiposController::class, 'misEquipos']);
$router->get('/remove', [EquiposController::class, 'quitarPokemon']);
$router->post('/rename', [EquiposController::class, 'renombrarEquipo']);

$router->get('/login', [LoginController::class, 'mostrarLogin']);
$router->post('/loggedin', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);

$router->get('/signup', [SignupController::class, 'mostrarSignup']);
$router->post('/signedin', [SignupController::class, 'signup']);

//test
$router->get('/card', [FichaController::class, 'verFicha']);
$router->post('/add', [FichaController::class, 'anadirPokemon']); //???

$router->resolve();

