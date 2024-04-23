<?php

namespace modelos;

use conexiones\bbdd\Bbdd;
use PDO;
use Exception;

class Equipo {
    private int $id;
    private string $nombre = null;
    private int $id_user;

    public PDO $pdo;

    /**
     * Recoge objeto PDO y así poder hacer queries en el resto de metodos
     * Crea el array con los pokemon en null.
     * @param Bbdd $bbdd
     */
    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
        //$this->array_pokemon = [$this->id_poke1, $this->id_poke2, $this->id_poke3, $this->id_poke4, $this->id_poke5, $this->id_poke6];
    }


    /**
     * funcion que crea los 3 equipos vacios automaticaemente
     * que sera usada en la funcion de creacion de usuario
     * @param int $id_user para el equipo
     * @return bool $confirmacion de que se creó correctamente
     */
    public function crearEquipos(int $id_user): bool {
        $confirmacion = false;
        for ($i = 0; $i < 3; $i++) {
            $q = $this->pdo->prepare("INSERT INTO Equipo (id_user) VALUES (:id_user);");
            $q->bindParam(':id_user', $id_user, PDO::PARAM_STR);
            $confirmacion = $q->execute();
            //quiza habria que meterlo en un array y comprobar que los 3 estan confirmados
        }
        return $confirmacion;
    }



















}
