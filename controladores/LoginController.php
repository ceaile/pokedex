<?php

namespace controladores;

use modelos\Usuario;
use modelos\Sesion;
use controladores\PadreController;
use controladores\EquiposController;
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
    public string $title = "Inicia Sesion en Pokédex";

    public function mostrarLogin() {
        if ($this->userLogeado) header("Location: home");
        //if($_SERVER['REQUEST_METHOD'] !== 'GET') exit; //set 404
        $this->renderView('login.php', [
            'title' => $this->title,
        ]);
    }


    public function login() { //
        try {
            // Recoge los datos del formulario
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = new Usuario($this->pdo, $this->pokeapi);
            $s = new Sesion();
            
            //valida user y pass y reenvía donde deba
            if ($user->loginValidado($username, $password)) {
                 $s->poner('username', $username);
                 header("Location: myteams"); //los datos de sesion no se envian por aqui
            } else {
                $this->renderView('login.php', [
                    'title' => $this->title,
                    'username' => $username,
                    'password' => $password,
                ]);
           
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }



    }

    public function logout() {
        if ($this->userLogeado){
            $this->s->eliminarSesion('username');
        }
        header('Location: login'); 
    }

}