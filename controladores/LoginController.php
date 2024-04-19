<?php

namespace Controladores;
use modelos\Usuario; 
use controladores\PadreController;

/*
Aquí está el flujo de cómo se relacionan:
El usuario ve y rellena el formulario en login.php.
Cuando el usuario envía el formulario, 
los datos del formulario se envían como una solicitud POST a login.php
En login.php, se detecta que la solicitud es un POST 
y se llama al método Logear() del LoginController.
que recoge los datos del formulario 
(que son los datos que el usuario ingresó en el formulario),
realiza la lógica de inicio de sesión y 
luego redirige al usuario a la página apropiada.
*/

/*
clase Sesion con sus metodos de logica
funcion de mostrar pag
*/


class LoginController extends PadreController {
    public function mostrarLogin() {
        //if($_SERVER['REQUEST_METHOD'] !== 'GET') exit; //set 404
        $variableLocal = null; //ejemplo
        $this->renderView('login.php', [
            'title' => "Inicia Sesion en Pokédex",
            'otraVariable' => $variableLocal,
        ]);
    }


    public function Logear() { //
        // Recoge los datos del formulario
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user = new Usuario($this->pdo);
        if ($user->loginValidado($username, $password)) { //ojo esa funcion no hace nada aun!!!!!
            session_start();
            $_SESSION['username'] = $username;
            header('Location: MisEquipos.php');
            exit();
        } else {
            header('Location: Login.php?error=Invalid credentials');
            exit();
        }
    }


}