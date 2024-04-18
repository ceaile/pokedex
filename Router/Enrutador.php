<?php

namespace Router;
use conexiones\bbdd\Bbdd;

//Lee la URL y carga el controlador y el método definido en esa ruta en el public/index.php
class Enrutador {
    public $pdo;
    public $get_routes;
    public $post_routes;

    public function __construct() {

    }

    public function get($path, $fn) {
        $this->get_routes[$path] = $fn;
    }

    public function post($path, $fn) {
        $this->post_routes[$path] = $fn;
    }

    public function resolve() {
        $path = $_SERVER['PATH_INFO'] ?? "/";
        $method = $_SERVER['REQUEST_METHOD'];

        $fn = $method === 'GET' ? $this->get_routes[$path] : $this->post_routes[$path];
        if(!$fn) header('Location: /404.php');

        call_user_func($fn, $this);
    }

    /*
    public function renderView($page, $params = []) {
        foreach ($params as $param => $value) {
            $$param = $value;
        }

        ob_start();
        include_once(__ROOT__.DIRECTORY_SEPARATOR."public".DIRECTORY_SEPARATOR."vistas".DIRECTORY_SEPARATOR.$page);
        $content = ob_get_clean();
        include_once(__ROOT__.DIRECTORY_SEPARATOR."public".DIRECTORY_SEPARATOR."vistas".DIRECTORY_SEPARATOR."_layout.php");
    }
    */
}

?>