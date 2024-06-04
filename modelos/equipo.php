<?php

namespace modelos;

use conexiones\bbdd\Bbdd;
use conexiones\api\PokeApi;
use PDO;
use Exception;


class Equipo {
    private int $id;
    private string $nombre;
    private int $id_user;
    private array $ids_equipos_user = []; //los id de los tres equipos asignados a ese user

    public PDO $pdo;
    public PokeApi $pokeapi;

    /**
     * Recoge objeto PDO y así poder hacer queries en el resto de metodos
     * Crea el array con los pokemon en null.
     * @param Bbdd $bbdd
     */
    public function __construct(PDO $pdo, PokeApi $pokeapi) {
        $this->pdo = $pdo;
        $this->pokeapi = $pokeapi;
        //$this->array_pokemon = [$this->id_poke1, $this->id_poke2, $this->id_poke3, $this->id_poke4, $this->id_poke5, $this->id_poke6];
    }


    /**
     * TESTEADA: FUNCIONA
     * funcion que crea los 3 equipos vacios automaticaemente
     * 
     * METER LA CREACION DE EQUIPOSPOKEMON 6 VECES
     * que sera usada en la funcion de creacion de usuario
     * @param int $id_user para el equipo
     * @return bool $confirmacion de que se creó correctamente
     */
    public function crearEquipos(int $id_user): bool {
        $confirmaciones = [];
        for ($i = 0; $i < 3; $i++) {
            $q = $this->pdo->prepare("INSERT INTO Equipo (id_user) VALUES (:id_user);");
            $q->bindParam(':id_user', $id_user, PDO::PARAM_INT);
            $confirmaciones[] = $q->execute(); //almacena las tres confirmaciones
        }
        return !in_array(false, $confirmaciones);
    }


    /**
     * Para usar en el controlador FichaController y saber
     * qué equipos tiene cada pokemon, dado que luego hay que guardar
     * en esos id el dato de que id de equipo-pokemon se mete
     */
    public function verEquipos(string $username): array {
        $u = new Usuario($this->pdo, $this->pokeapi);
        $id_user = $u->getId($username);
        if ($id_user != 0) {
            $q = $this->pdo->prepare("SELECT id, nombre FROM equipo WHERE id_user = :id_user");
            $q->bindParam(':id_user', $id_user, PDO::PARAM_INT);
            $q->execute();
            $result = $q->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;
    }



    public function renombrarEquipo(int $id_equipo, string $nuevoNombre){
        $q = $this->pdo->prepare("UPDATE equipo SET nombre = :nombre WHERE id = :id");
        $q->bindParam(':id', $id_equipo, PDO::PARAM_INT);
        $q->bindParam(':nombre', $nuevoNombre, PDO::PARAM_STR);
        $confirmacion = $q->execute();
        return (bool) $confirmacion;
    }
}
