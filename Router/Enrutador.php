<?php

namespace Router;

use conexiones\bbdd\Bbdd;
use Controladores\HomeController;
use Controladores\LoginController;

//Lee la URL y carga el controlador y el método definido en esa ruta en el public/index.php
class Enrutador {
    public $pdo;
    public $get_routes;
    public $post_routes;

    public function __construct() {

    }

    /**
     * Esto es lo que hace que en index
     */
    public function get($path, $fn) {
        $this->get_routes[$path] = $fn;
    }

    public function post($path, $fn) {
        $this->post_routes[$path] = $fn;
    }

    public function resolve() {
        if (isset($_SERVER['PATH_INFO'])) {
            $path = $_SERVER['PATH_INFO'];
        } else {
            $path = "/"; // Si no existe, usa "/" como valor predeterminado
        }
        //lo mismo pero con sintaxis dificil T^T
        //$path = $_SERVER['PATH_INFO'] ?? "/";
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method === 'GET') {
            $fn = $this->get_routes[$path];
        } else {
            $fn = $this->post_routes[$path];
        }

        if (!$fn) { // Si la clase Controlador para la ruta no existe
            header('Location: /404.php');
        }
        //mismo codigo pero mas ilegible :_
        //$fn = $method === 'GET'? $this->get_routes[$path] : $this->post_routes[$path];
        //if(!$fn) header('Location: /404.php');

        /*
        NO es esto lo que enruta. O sea sí pero no.
        Donde verdaderamente se establecen los controladores, las rutas 
        y los metodos del cotrolador es en el index.php
        Como es una chapucilla pues hay que hacer algo parecido aqui y mantenerlos ambos "iguales"
        porque antes los metodos eran estaticos y con la ultima linea (ahora comentada) valía
        */
        if ($path == "/") {
            $c = new HomeController();
            $c->home();
            
        } else if ($path == "/login") {
            $c = new LoginController();
            $c->mostrarLogin();
        } //etc con mas else ifs
        //call_user_func($fn, $this); //TENGO QUE ARREGLARLO CON IFS 
    }

}

?>