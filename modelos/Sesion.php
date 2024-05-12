<?php

namespace modelos;

class Sesion {
/* Sesiones que usaré
string $_SESSION['username]
int $_SESSION['id_user] ???
*/
    public function __construct() {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    /*
    public function sessionStarted() {
        if (session_status() == PHP_SESSION_NONE) {
            return false;
        }
    }
*/
    public function existe(string $nombreSesion): bool {
        return (isset($_SESSION[$nombreSesion])) ? true : false;
    }

    public function poner(string $nombreSesion, $valor): bool {
        return $_SESSION[$nombreSesion] = $valor;
    }

    public function obtenerSesion(string $nombreSesion): string {
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
