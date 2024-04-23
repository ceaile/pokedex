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
     * SIN TESTEAR
     * comprueba si el user que queremos meter existe
     * si no existe, lo crea, junto a sus 3 equipos automaticamente.
     * COMPROBADA QUE FUNCIONA(BA) en su version anterior xdddd
     * @param string $name es un username
     * @param string $pass es la password que quiere insertar en bbdd
     * @return bool true si lo consiguio
     */
    public function insertarUser(string $name, string $pass): bool {
        $confirmacionCreacionEquipos = false;
        $insercionConfirmada = false;
        if (!$this->userExiste($name)) {
            $pass = password_hash($pass, PASSWORD_DEFAULT);
            $q = $this->pdo->prepare("INSERT INTO Usuario (username, password) VALUES (:username, :password);");
            $q->bindParam(':username', $name, PDO::PARAM_STR); //usado en la siguiente query
            $q->bindParam(':password', $pass, PDO::PARAM_STR);
            $insercionConfirmada = $q->execute();

            if ($insercionConfirmada) { 
                $id = $this->getId($name);
                $equipo = new Equipo($this->pdo);
                if ($equipo->crearEquipos($id))
                    $confirmacionCreacionEquipos = true;
            }
        } else {
            return false;
        }
        return $confirmacionCreacionEquipos && $insercionConfirmada;
    }


    /**
     * COMPROBADA QUE FUNCIONAA
     * funcion de comprobacion de que el usuario no existe primero para antes de insertar
     * @param string $name es un username de Usuario
     * @return bool Si el user existe o no. 
     *              Si no hay resultados, fetch() devolverá false
     *              O sea true: user ya existe; false: user libre
     *              y fetchAll() devolverá un array vacío
     */
    public function userExiste(string $name): bool {
        $q = $this->pdo->prepare('SELECT username FROM Usuario WHERE username = :username');
        $q->bindParam(':username', $name, PDO::PARAM_STR);
        $q->execute();
        return (bool) $q->fetch();
    }


    /**
     * SIN TESTEAR
     * funcion para usar en la insercion de User y
     * para sacar el parametro necesario para la funcion de creacion de equipos
     * que está en la entidad Equipo
     * @param string username
     * @return int $id
     */
    public function getId(string $username): int {
        $q2 = $this->pdo->prepare('SELECT id FROM Usuario WHERE username = :username');
        $q2->bindParam(':username', $username, PDO::PARAM_STR);
        if ($q2->execute())
            $id = $q2->fetch()['id'];
        return $id;
    }





    /**
     * FUNCIONA, AL MENOS CON LA VERSION PROVISIONAL DE PASS SIN HASHEAR (donde el OR).
     * Comprueba que el user existe
     * Saca la contraseñá hasheada de ese user
     * comprueba que la contraseña hasheada y la que se introdujo por parametro son la misma
     * @param string $name es un username
     * @param string $pass es la password sin hashear
     * OJO CUIDADO que en el if del password_verify hay otra comparacion para las pass sin hashear
     * que se quitará pero sigue ahí porque aún no se ha hecho el sign in
     */
    public function loginValidado(string $username, string $passwd): bool {
        $conf = false;
        if ($this->userExiste($username)) {
            $q = $this->pdo->prepare('SELECT password FROM Usuario WHERE username = :username');
            $q->bindParam(':username', $username, PDO::PARAM_STR);
            $q->execute();
            $contrasenaHasheada = $q->fetch();
            if ((bool) $contrasenaHasheada) {
                if ((password_verify($passwd, $contrasenaHasheada['password']) || ($passwd == $contrasenaHasheada['password']))) {
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