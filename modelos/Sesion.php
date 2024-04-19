<?php
namespace modelos;

class Sesion {

    //$_SESSION['username'] es nuestro estandar de datos de sesion

    /* notas para mejorar la clase que ahora mismo no entiendo lol:
    clase Sesion con sus metodos de logica
    funcion de mostrar pag
    */

    /**
     * Inicia la sesion y crea la $_SESSION['username] con un string en blanco.
     */
    public function __construct() {
        session_start();
        $this->crearSesionUser("");
    }

    public function existe(string $nombreSesion): bool {
        return (isset($_SESSION[$nombreSesion])) ? true : false;
    }

    public function poner(string $nombreSesion, $valor): bool {
        return $_SESSION[$nombreSesion] = $valor;
    }

    public function obtenerSesion(string $nombreSesion): bool {
        return $_SESSION[$nombreSesion];
    }

    /**
     * Principalmente para usar con el $nombreSesion 'username'
     */
    public function eliminarSesion(string $nombreSesion): bool {
        if ($this->existe($nombreSesion)) {
            unset($_SESSION[$nombreSesion]);
            return true;
        } else {
            return false;
        }

    }

    /**
     * Rellena el $_SESSION['username] del usuario
     * Parecido a put pero solo para el username
     */
    public function crearSesionUser(string $username) {
        $this->poner('username', $username);
    }


    /**
     * Comprueba que el la clave username este seteada y que el valor no este en blanco
     */
    public function userLogeado(): bool {
        return $this->existe("username") && $_SESSION["username"] != "" ? true : false;
    }


}