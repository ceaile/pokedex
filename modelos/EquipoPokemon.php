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
    public function updateUnEquipoPokemon(int $id_equipo, int $id_pokemon = null): bool {
        $q = $this->pdo->prepare("INSERT INTO `equipo-pokemon` (id_equipo, id_pokemon) VALUES (:id_equipo, :id_pokemon)");
        $q->bindParam(':id_equipo', $id_equipo, PDO::PARAM_INT);
        $q->bindParam(':id_pokemon', $id_pokemon, PDO::PARAM_INT);
        $confirmacion = $q->execute();
        return (bool) $confirmacion;
    }




    /**
     * automatizacion de crear equipos de pokemon todos a la vez cuando se creen los equipos
     */
    public function crearTodosEquipos_pokemon(array $ids_equipos) {
        $confirmaciones = [];
        foreach ($ids_equipos as $id_equipo) {
            for ($i = 0; $i < 6; $i++) {
                $q = $this->pdo->prepare("INSERT INTO `equipo-pokemon` (id_equipo) VALUES (:id_equipo);");
                $q->bindParam(':id_equipo', $id_equipo, PDO::PARAM_INT);
                $confirmaciones[] = $q->execute();
            }
        }
        return !in_array(false, $confirmaciones);
    }






    /**
     * para pag de My Teams. desde el controlador consi
     * return array?
     */
    public function sacarDatosEquiposPokemon(string $username) {
        $q = $this->pdo->prepare("SELECT e.nombre as nombreEquipo, 
                                        ep.id as id_equipoPokemon, 
                                        ep.id_equipo as id_equipo, 
                                        ep.id_pokemon as id_pokemon
                                FROM `equipo-pokemon`ep
                                    JOIN equipo e ON ep.id_equipo = e.id
                                    JOIN usuario u ON e.id_user = u.id
                                WHERE u.username = :username;");
        $q->bindParam(":username", $username, PDO::PARAM_STR);
        (bool) $confirmacion = $q->execute();
        return $confirmacion ? $q->fetchAll(PDO::FETCH_ASSOC) : false;
        //devuelve (array) $q->fetchAll() si $confirmacion es verdadero, false si no
    }




}
