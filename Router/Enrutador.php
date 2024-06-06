<?php

namespace Router;

/*
use conexiones\bbdd\Bbdd;
use Controladores\HomeController;
use Controladores\LoginController;
use Controladores\PadreController;
use Controladores\SignupController;
use Controladores\EquiposController; */

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
        
        $method = $_SERVER['REQUEST_METHOD'];
        
        if ($method === 'GET') {
            $fn = $this->get_routes[$path];
        } else {
            $fn = $this->post_routes[$path];
        }

        if (!$fn) { // Si la clase Controlador para la ruta no existe
            header('Location: /404');
        }

        $class = $fn[0];
        $methodName = $fn[1];

        $instance = new $class();
        call_user_func([$instance, $methodName]);
        

    }

}

