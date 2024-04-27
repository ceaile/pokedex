<?php

namespace controladores;

use modelos\Usuario;
use modelos\Sesion;
use controladores\PadreController;
use Exception;

/*
Aquí está el flujo de cómo se relacionan el controlador y las pags:
El enrutador mira la url que puso el user, redirige a un metodo de este controlador
Ese es mostrarLogin(), el que renderiza el formulario.
En el formulario, en el action, en lugar de poner un archivo hay una FUNCION
esa funcion tambien esta en este controlador, que es en este caso logear()
que es el que ejecuta el login
*/


class LoginController extends PadreController {
    public function mostrarLogin() {
        //if($_SERVER['REQUEST_METHOD'] !== 'GET') exit; //set 404
        $variableLocal = null; //ejemplo
        $this->renderView('login.php', [
            'title' => "Inicia Sesion en Pokédex",
        ]);
    }


    public function login() { //
        try {
            // Recoge los datos del formulario
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = new Usuario($this->pdo);
            //crea sesion si no la había
            
            //valida user y pass y reenvía donde deba
            if ($user->loginValidado($username, $password)) { //ojo esta funcion ya hace pero esta sin testear
                 $this->s->crearSesionUser($username);
                 //quiza en lugar de usar un this renderview
                 //deberia ser un obj del controlador en cuestion
                 //que use su metodo home() ????
                $this->renderView('misequipos.php', [
                    'sesion' => $this->s->obtenerSesion('username'),
                ]);
                exit();
            } else {
                $this->renderView('login.php', [
                    'username' => $username,
                    'password' => $password,
                ]);
                exit();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }



    }

    //user2 password2

}