<?php

namespace Controladores;

use Router\Enrutador;
use modelos\Usuario;

class PrincipalController {
    public static function index(Enrutador $router) {
        if($_SERVER['REQUEST_METHOD'] !== 'GET') exit; //set 404

        $router->renderView('index.php', ['title' => '¡¡¡¡¡titulo Controlador!!!!']);
    }

    /**
     * test a sacar la lista de pokemon que ahora mismo esta en carpeta api pero no deberia xd
     */
    public static function lista(Enrutador $router) {
        if($_SERVER['REQUEST_METHOD'] !== 'GET') exit; //set 404

        $usuarioTest = new Usuario($router->pdo);
        //obj usuario usa metodo insertar para meter en bbdd

        $usuarioTest->insertarUser("user2", "password2");
        


        $router->renderView('conexionApi.html');
    }
}
