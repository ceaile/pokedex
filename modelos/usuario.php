<?php

namespace App\modelos;

use App\conexiones\bbdd\bbdd;
use Exception;

class Usuario {
    private $pdo;
    private $id;
    private $username;
    private $password; // hashed

    private $id_equipo1 = new Equipo();
    private $id_equipo2 = new Equipo();
    private $id_equipo3 = new Equipo();

    public function __construct($pdo) {
    }

    public function __constructor($pdo, $username, $password) {
    }

    public function getId() {
    }
    public function getUsername() {
        return $this->username;
    }

    public function setUsername($nuevoUsername) {
        $this->username = $nuevoUsername;
    }

    public function getId_Equipo1() {
        return $this->id_equipo1;
    }

    public function getId_Equipo2() {
        return $this->id_equipo2;
    }
    public function getId_Equipo3() {
        return $this->id_equipo3;
    }


    //function crearUser()
    //funcion 
}
