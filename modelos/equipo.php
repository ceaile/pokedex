<?php

namespace modelos;
use conexiones\bbdd\Bbdd;
use PDO;
use Exception;

class Equipo {
    private int $id;
    private string $nombre = null;
    private int $id_user;

    //atributos extra para manejar los datos
    public Bbdd $bbdd;
    public $array_pokemon = [0, 0, 0, 0, 0, 0]; //pathetic syntax because php

    public $id_poke1 = null; // quiza publico para conectar con la api?
    public $id_poke2  = null; //cuidado que puede que al sacar datos en el frontend de errores por ser null
    public $id_poke3  = null;
    public $id_poke4  = null;
    public $id_poke5  = null;
    public $id_poke6  = null;

    /**
     * Recoge objeto bbdd para poder acceder a su atributo PDO y así poder hacer queries en el resto de metodos
     * @param Bbdd $bbdd
     */
    public function __construct(Bbdd $bbdd) {
        $this->bbdd = $bbdd;
    }

    /**
     * funcion que crea los 3 equipos vacios automaticaemente
     * que sera usada en la funcion de creacion de usuario
     * @param int $id_user para el equipo
     */
    public function crearEquipos(int $id_user) :bool {
            $this->bbdd->conexionBbdd->exec("USE pokedex"); //no se si sera necesaria dentro del bucle
            for ($i = 0; $i < 3; $i++){
                $q = $this->bbdd->conexionBbdd->prepare("INSERT INTO Equipo (id_user) VALUES (:id_user);");
                $q->bindParam(':id_user', $id_user, PDO::PARAM_STR);
                $confirmacion = $q->execute();
                //quiza habria que meterlo en un array y comprobar que los 3 estan confirmados
                //pero si uno funciona, el resto segramnte tambien
            }
            return $confirmacion; //esto no me cuadra del todo
    }


    /**
     * isnertar pokemon en equipo
     */








    //A BORRAR SEGURAMENTE
    public function getId() {
        //query de sacar el dato de bbdd?
        return $this->id;
    }

    public function getNombre() {
        //query de sacar el dato de bbdd?
        return $this->nombre;
    }
    public function setNombre($nuevoNombre): bool {
        if ($this->nombre != $nuevoNombre){
            $this->nombre = $nuevoNombre;
            return true;
        } else{
            return false;
        } 
    }

    public function getId_poke($posicion = null): int {
        $id_pokemon = 1; //a null para que no se queje
        if ($posicion == null){
         $id_pokemon = end($this->array_pokemon);
         reset($array_pokemon);
        } else {
            $id_pokemon = $this->array_pokemon[$posicion-1];
        }
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
