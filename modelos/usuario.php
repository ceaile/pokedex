<?php
namespace modelos;

use conexiones\bbdd\Bbdd;
use modelos\Equipo;
use PDO;
use Exception;

class Usuario {
    public PDO $pdo;
    private int $id;
    private string $username;
    private string $password; // hashed???? habra que cambiar los metodos


    /**
     * Recoge objeto bbdd para poder acceder a su atributo PDO y así poder hacer queries en el resto de metodos
     * @param Bbdd $bbdd
     */
    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }




    
    /**
     * Setea bbdd, comprueba si el user que queremos meter existe
     * si no existe, lo crea, junto a sus 3 equipos.
     * No recoge param $id porque es autoincremental
     * COMPROBADA QUE FUNCIONA(BA) en su version anterior xdddd
     * en el futuro: hashea la contraseña antes de insertarla en bbdd <----
     * Cuando se crea un usuario, se crean los 3 equipos automaticamente
     * @param string $name es un username
     * @param string $pass es la password que quiere insertar en bbdd
     * @return bool true si lo consiguio
     */
    public function insertarUser(string $name, string $pass): bool {
        if (!$this->userExiste($name)) {
            $pass = password_hash($pass, PASSWORD_DEFAULT);
            $q = $this->pdo->prepare("INSERT INTO Usuario (username, password) VALUES (:username, :password);");
            $q->bindParam(':username', $name, PDO::PARAM_STR); //usado en la siguiente query
            $q->bindParam(':password', $pass, PDO::PARAM_STR);
            $confirmacionInsercion = $q->execute();

            if ($confirmacionInsercion) { //saca el id del user que acabamos de crear para poder meterlo en esta funcion de crear equipos
                $q2 = $this->pdo->prepare('SELECT id FROM Usuario WHERE username = :username');
                $q2->bindParam(':username', $name, PDO::PARAM_STR);
                $q2->execute(); //deberia salir bien... = true
                $id = $q2->fetch(); //parametro

                $equipo = new Equipo($this->pdo); //no me acuerdo de para que esta funcion tenia que recoger como param thisbbdd :_
                if ($equipo->crearEquipos($id)) {
                    $confirmacionCreacionEquipos = true;
                }
            }
        } else {
            return false;
        }
        return $confirmacionCreacionEquipos && $confirmacionInsercion; //unreachable seguramente?
    }


    /**
     * funcion de comprobacion de que el usuario no existe primero para antes de insertar
     * @param string $name es un username de Usuario
     * @return bool Si el user existe o no. 
     *              Si no hay resultados, fetch() devolverá false
     *              O sea true: user ya existe; false: user libre
     *              y fetchAll() devolverá un array vacío
     */
    public function userExiste(string $name): bool {
        $q = $this->pdo->prepare('SELECT nombre FROM Usuario WHERE username = :username');
        $q->bindParam(':username', $name, PDO::PARAM_STR);
        $q->execute();
        return $q->fetch(); //tengo que comprobar qué está devolviendo, si bool o resultado
    }

    /**
     * Comprueba que el user existe
     * Saca la contraseñá hasheada de ese user
     * comprueba que la contraseña hasheada y la que se introdujo por parametro son la misma
     * @param string $name es un username
     * @param string $pass es la password sin hashear
     */
    public function loginValidado(string $username, string $passwd):bool {
        $conf = false;
        if ($this->userExiste($username)) {
            $q = $this->pdo->prepare('SELECT password FROM Usuario WHERE username = :username');
            $q->bindParam(':username', $username, PDO::PARAM_STR);
            $q->execute();
            if ($q->fetch()){
                $contrasenaHasheada = $q->fetch();
                if (password_verify($passwd, $contrasenaHasheada)) {
                    $conf = true;
                }
            }
        }
        return $conf;
    }


    public function getPassword(): string {
        return $this->password;
    }










    /**
     * Para V2. No en funcionamiento
     * @param string $nuevoNombre
     * @return bool Si retorna false es que el username es el mismo y por lo tanto no puede cambiarlo
     */
    /*
    public function cambiarUsername(string $nombreActual, string $nuevoNombre, string $id): bool {
        $pdo = $this->bbdd->conexionBbdd;
        $pdo->exec("USE pokedex");
        $querySacarUser = $pdo->prepare("SELECT username FROM Usuario WHERE username = :username");
        $querySacarUser->bindParam(":username", $nuevoNombre);
        $userEncontrado = $querySacarUser->execute(); //bool
        $userSacado = $querySacarUser->fetch(PDO::FETCH_ASSOC);
        if (!$userEncontrado) {

        }
        //si no lo ha encontrado, o sea no existe u
        //hay que comprobar que ese ese username sacado no esta vacio, antes de compararlo
        //devuelve una excepcion si no encuentra nada?
        //modificar despues:
        if ($this->username != $nuevoNombre) {
            $this->setUsername($nuevoNombre);
            $query = $pdo->prepare("UPDATE Usuarios SET username = :username WHERE id = :id");
            $query->bindParam(':username', $nuevoNombre);
            $query->execute();
            return true;
        } else {
            return false;
        }

    }
    */



}