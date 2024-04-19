<?php

namespace Controladores;
use modelos\Usuario; 
use modelos\Sesion; 
use controladores\PadreController;

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


    public function logear() { //
        // Recoge los datos del formulario
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user = new Usuario($this->pdo);
        $s = new Sesion();

        if ($user->loginValidado($username, $password)) { //ojo esta funcion ya hace pero esta sin testear
            $s->crearSesionUser($username);
            header('Location: MisEquipos.php'); //aqui para testear podria haber una pag que muestre lo que salio por post y session
            exit();
        } else {
            header('Location: Login.php');
            exit();
        }
    }


}