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


    /**
     * funcion para poder meter como valor del array
     * sin testear
     */
    public function getIdEquipopokemon(int $id_equipo, int $id_pokemon): int {
        $q = $this->pdo->prepare("SELECT ep.id
                                    FROM `equipo-pokemon` ep
                                    WHERE ep.id_equipo = :id_equipo)
                                        AND ep.id_pokemon = :id_pokemon;");
        $q->bindParam(":id_equipo", $id_equipo, PDO::PARAM_INT);
        $q->bindParam(":id_pokemon", $id_pokemon, PDO::PARAM_INT);
        (bool) $id_equipopokemon = $q->execute();
        return $id_equipopokemon ? $q->fetchAll(PDO::FETCH_ASSOC) : 0;
    }




    /**
     * Correcta y funcionando.
     * automatizacion de crear equipos de pokemon todos a la vez cuando se creen los usuarios
     * @param array simple de ints con los id de equipos
     */
    public function crearTodosEquipos_pokemon(array $ids_equipos): bool {
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
     * sin testear. para el bucle de pag mis equipos?
     * @return array $q->fetchAll() si $confirmacion es verdadero
     * @return bool false si no
     */
    public function saberPokemonDelEquipo(int $id_equipo) {
        $q = $this->pdo->prepare("SELECT ep.id as id_equipopokemon, ep.id_pokemon
                                    FROM `equipo-pokemon` ep
                                    JOIN equipo e ON ep.id_equipo = e.id
                                    WHERE e.id = :id_equipo;");
        $q->bindParam(":id_equipo", $id_equipo, PDO::PARAM_INT);
        (bool) $confirmacion = $q->execute();
        return $confirmacion ? $q->fetchAll(PDO::FETCH_ASSOC) : false;
    }


    /**
     * para pag de My Teams. desde el controlador consi
     * return array? matriz? FUNCIONA PERO NOT ES UTIL DE MOMENTO
     * @return array $q->fetchAll() si $confirmacion es verdadero
     * @return bool false si no
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
        //devuelve 
    }



    /**
     * @deprecated version of crearTodosEquipos_pokemon()
     * @param int $id_equipo
     * @param int $id_pokemon (tabla Pokemon no existe en BBDD)
     * @return bool $confirmacion 
     */
    public function crearUnEquipoPokemon(int $id_equipo, int $id_pokemon = null): bool {
        $q = $this->pdo->prepare("INSERT INTO `equipo-pokemon` (id_equipo, id_pokemon) VALUES (:id_equipo, :id_pokemon)");
        $q->bindParam(':id_equipo', $id_equipo, PDO::PARAM_INT);
        $q->bindParam(':id_pokemon', $id_pokemon, PDO::PARAM_INT);
        $confirmacion = $q->execute();
        return (bool) $confirmacion;
    }


}
