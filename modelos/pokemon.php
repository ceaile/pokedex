<?php

namespace modelos;
use conexiones\bbdd\Bbdd;
use PDO;
use Exception;

/**
 * 
 */
class Pokemon {
    private int $id;
    private string $nombre;
    private string $descripcion;
    private string $tipo;
    private int $altura;
    private int $peso;
    private int $habilidades;
    

}