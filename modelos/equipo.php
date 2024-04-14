<?php

namespace App\modelos;

use App\conexiones\bbdd\bbdd;
use Exception;

class Equipo {
    public $id;
    public $nombre;
    public $id_poke1;
    public $id_poke2;
    public $id_poke3;
    public $id_poke4;
    public $id_poke5;
    public $id_poke6;


    public function __construct() {
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }
    public function setNombre($nuevoNombre) {
        if ($this->nombre != $nuevoNombre){
            $this->nombre = $nuevoNombre;
            return true;
        } else{
            return false;
        } 
    }

    //and so on and on con el resto de variables
    //y luego el añadir de la bbdd el pokemon habra que ver si aqui o en Equipo
}
