<?php

namespace modelos;

use conexiones\api\PokeApi;
use conexiones\bbdd\Bbdd;
use PDO;
use modelos\Equipo;
use modelos\Pokemon;
use Exception;

class EquipoPokemon {
    private int $id;
    private int $id_equipo;
    private int $id_pokemon;


    public PDO $pdo;
    public PokeApi $pokeapi;

    /**
     * Recoge objeto PDO y así poder hacer queries en el resto de metodos
     * @param Bbdd $bbdd
     */
    public function __construct(PDO $pdo, PokeApi $pokeapi) {
        $this->pdo = $pdo;
        $this->pokeapi = $pokeapi;
    }


    /**
     * importante el orden en el que se introducen los parametros!!!
     * funcion para el modal FichaController.
     * En él se mira si esté relleno
     */
    public function insertarPokemon(int $id_equipopokemon, $id_pokemon) {
        $q = $this->pdo->prepare("UPDATE `equipo-pokemon` SET id_pokemon = :id_pokemon WHERE id = :id");
        $q->bindParam(':id', $id_equipopokemon, PDO::PARAM_INT);
        //$q->bindParam(':id_equipo', $id_equipo, PDO::PARAM_INT);
        $q->bindParam(':id_pokemon', $id_pokemon, PDO::PARAM_INT);
        $confirmacion = $q->execute();
        return (bool) $confirmacion;
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
     * Testeada. Para el gigabucle de pag mis equipos
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


    /**
     * El GigaBucle Maestro. Cuidadín...
     * devuelve una matriz compleja con datos del equipo y de los pokemon
     * dentro de cada uno. estructura comentada abajo!! importante
     */
    public function getBucleEquipoConPokemon(string $username): array {
        $e = new Equipo($this->pdo, $this->pokeapi);
        $p = new Pokemon($this->pokeapi);
        $equiposDeUsuario = $e->verEquipos($username);
        $i = 0;
        foreach ($equiposDeUsuario as $equipo) {
            if ($equiposDeUsuario[$i]['nombre'] == null || $equiposDeUsuario[$i]['nombre'] == '') {
                $equiposDeUsuario[$i]['nombre'] = "My team " . $i + 1;
            }
            $pokemonDelEquipo = $this->saberPokemonDelEquipo($equipo['id']);

            // Agregar la información de 'art' a cada Pokémon del equipo
            foreach ($pokemonDelEquipo as &$pokemon) {
                if ($pokemon['id_pokemon'] > 0){
                    $p->llamarPokemon($pokemon['id_pokemon']);
                    $pokemon['art'] = $p->getSprite();
                } else{
                    $pokemon['art'] = "https://dummyimage.com/400/000/fff";
                }
                //cambiar a sprite
            } //todo este trozo es nuevo. cuidado!!

            $equiposDeUsuario[$i]['seisPokemons'] = $pokemonDelEquipo; //meter el array de 6 pokemon dentro del array de equipos
            $i++;
        }
        return $equiposDeUsuario;
        /*
        array (
            0 =>  
            array (
                    'id' => 4,
                    'nombre' => NULL,
                    'seisPokemons' => 
                        array (
                            0 => 
                            array (
                                'id_equipopokemon' => 5,
                                'id_pokemon' => 0,
                                'art' => ruta.jpg
                                ... //datos de pokeapi
                        ),
                            1 =>... //continúa

            )
            1=>... //continúa

        )    
        */
    }



    /**
     * Para el controlador EquiposController, vacía el id_pokemon a 0
     */
    public function quitarPokemonDeEquipo(int $id_equipopokemon): bool {
        $q = $this->pdo->prepare("UPDATE `equipo-pokemon` SET id_pokemon = 0 WHERE id = :id");
        $q->bindParam(':id', $id_equipopokemon, PDO::PARAM_INT);
        $confirmacion = $q->execute();
        return (bool) $confirmacion;
    }
}
