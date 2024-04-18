<?php

namespace Controladores;
use Router\Enrutador; //con esto consigue hacer el renderview, si no nada
use modelos\Usuario; 

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
class LoginController {
    public static function mostrarLogin(Enrutador $router) {
        //if($_SERVER['REQUEST_METHOD'] !== 'GET') exit; //set 404
        $variableLocal = null; //ejemplo

        $router->renderView('login.php', [
            'title' => "Inicia Sesion en Pokédex",
            'otraVariable' => $variableLocal,
        ]);
    }




    public static function Logear(Enrutador $router) {
        // Recoge los datos del formulario
        $username = $_POST['username'];
        $password = $_POST['password'];

        $router = new Enrutador(); //necesario??? para el siguiente arg del new usuario
        $user = new Usuario($router->pdo); //el arg ??????????

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