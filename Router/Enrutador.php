<?php
namespace Router;

//Lee la URL y carga el controlador y el método definido en esa ruta en el public/index.php

class Enrutador {
    public $pdo;
    public $get_routes;
    public $post_routes;

    public function __construct() {
    }

    /**
     * Añade una ruta GET al enrutador.
     * @param string $path La ruta de la URL.
     * @param array $fn Un arreglo que contiene el controlador y el método que maneja la ruta.
     * Esta función guarda la ruta y su correspondiente controlador y método en el arreglo get_routes.
     */
    public function get($path, $fn) {
        $this->get_routes[$path] = $fn;
    }

    /**
     * Añade una ruta POST al enrutador.
     * @param string $path La ruta de la URL.
     * @param array $fn Un arreglo que contiene el controlador y el método que maneja la ruta.
     * Esta función guarda la ruta y su correspondiente controlador y método en el arreglo post_routes.
     */
    public function post($path, $fn) {
        $this->post_routes[$path] = $fn;
    }

    /**
     * Resuelve la ruta actual basada en la URL y el método HTTP.
     * Esta función determina la ruta actual desde $_SERVER['PATH_INFO'] y el método HTTP desde $_SERVER['REQUEST_METHOD'].
     * Luego busca el controlador y método correspondiente en get_routes o post_routes según el método HTTP.
     * Si la ruta no existe, redirige a una página 404. Si existe, instancia el controlador y llama al método correspondiente.
     * Obtiene el path de la URL, o usa "/" si no está definido
     * Obtiene el método HTTP (GET o POST)
     * Selecciona la función correspondiente según el método HTTP
     * Si no se encuentra una función para la ruta, redirige a 404
     * Obtiene el nombre de la clase y el método del controlador
     * Crea una instancia del controlador y llama al método
     */
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

        if (!$fn) { //si la clase Controlador para la ruta no existe
            header('Location: /404');
        }

        $class = $fn[0]; //controlador
        $methodName = $fn[1]; //metodo del controlador

        $instance = new $class();
        call_user_func([$instance, $methodName]);


    }

}

