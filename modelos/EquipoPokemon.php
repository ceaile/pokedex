<?php

namespace modelos;

use conexiones\bbdd\Bbdd;
use PDO;
use Exception;

class EquipoPokemon {
    private int $id;
    private int $id_equipo;
    private int $id_pokemon;


    public PDO $pdo;

    /**
     * Recoge objeto PDO y así poder hacer queries en el resto de metodos
     * @param Bbdd $bbdd
     */
    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }



    //FUNCIONES:
    /**
     * Se utiliza en FichaController para que cuando se clicke en el modal
     * y se recoja el id del equipo y de la ficha del pokemon
     * que se cree este registro
     * Luego estos datos servirán para (???)
     * @param int $id_equipo
     * @param int $id_pokemon (tabla Pokemon no existe en BBDD)
     * @return bool $confirmacion 
     */
    public function crearEquipoPokemon(int $id_equipo, int $id_pokemon):bool {
        $q = $this->pdo->prepare("INSERT INTO `equipo-pokemon` (id_equipo, id_pokemon) VALUES (:id_equipo, :id_pokemon)");
        $q->bindParam(':id_equipo', $id_equipo, PDO::PARAM_INT);
        $q->bindParam(':id_pokemon', $id_pokemon, PDO::PARAM_INT);
        $confirmacion = $q->execute();
        return (bool)$confirmacion;
    }


}
