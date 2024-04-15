<?php

namespace App\modelos;

use App\conexiones\bbdd\bbdd;
use Exception;

class Equipo {
    private $pdo;
    private $id;
    private $nombre;

    public $array_pokemon = [null, null, null, null, null, null]; //pathetic syntax because php

    /* public $id_poke1 = null; // quiza publico para conectar con la api?
    public $id_poke2  = null; //cuidado que puede que al sacar datos en el frontend de errores por ser null
    public $id_poke3  = null;
    public $id_poke4  = null;
    public $id_poke5  = null;
    public $id_poke6  = null; */

    public function __construct() {
    }

    public function __constructor($nombre) {
        $this->id = ; //tengo que ver como se conecta con la bbdd, ya que es autogenerado !!!!!!!!
        $this->nombre = $nombre;
    }
    public function getId() {
        //query de sacar el dato de bbdd?
        return $this->id;
    }

    public function getNombre() {
        //query de sacar el dato de bbdd?
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

    public function getId_poke($posicion = null) {
        $id_pokemon;
        if ($posicion == null){
         $id_pokemon = end($array_pokemon);
         reset($array_pokemon);
        } else{
            $array_pokemon[$posicion-1];}
        return $id_pokemon;
    }

    

/**
 * Setea el ID de un Pokémon en la posición especificada o al final del array.
 * @param int|null $posicion Posición a setear el ID del Pokémon.
 *                  Tiene en cuenta que por el frontend puede que llegue una posicion "normal",
 *                  que no empiece de 0. Si luego esto se solventa, debe corregirse el método!
 * @param int $idNuevoPoke El nuevo ID del Pokémon que se desea setear.
 * @return bool Retorna true si el ID se seteó correctamente, false si ocurrió un error.
 */
    public function setId_pokemon($posicion = null, $idNuevoPoke){
        $a = $this->array_pokemon;
        if ($posicion == null){
            $ultimoPoke = end($a);
            $a[count($a)-1] = $idNuevoPoke; //similar a array[array.length-1] de java
            //end($array) = $idNuevoPoke; //no se puede usar asi :(
        } else{
            if ($posicion > 0 && $posicion <= count($this->array_pokemon)) { //correccion por si hay problemas con el pointer
                $a[$posicion-1] = $idNuevoPoke;
            } else {
                return false;
            }
        }
        return true;
    }

    //and so on and on con el resto de variables
    //y luego el añadir de la bbdd el pokemon habra que ver si aqui o en Equipo

    /**
     * Añade pokemon al equipo
     * Primero lo setea en el objeto (?)
     * luego lo inserta en bbbdd
     * @param PDO pdo para hacer la conexion
     * @param int id_pokemon para añadirlo al equipo
     * @param int|null posicion
     */
    public function anadirPokemon($pdo, $id_pokemon, $posicion=null) {
        $a = $this->array_pokemon;
        if ($this->setId_pokemon($id_pokemon)){
            if ($posicion!=null && $posicion>0 && $posicion<=6){
                $addPokeQuery = "INSERT INTO Equipos (id_pokemon".$posicion.") VALUES ($idPokemon)";
                return true;
            } else if($posicion===null){
                for($i = 0; i >= $a[acount($a)]; $i++){
                    if ($a[$i] == null) {
                      $addPokemonQuery = "INSERT INTO Equipos (id_pokemon".$a[$i].") VALUES ($idPokemon)";
                    }
                }
            } else {
            return false; }
            //resto de codigo de insercion de bbdd, ya con la query correcta (?)
        } else {
        return false;
        }
    }
       
    
}
