<?php

namespace modelos;

use conexiones\bbdd\Bbdd;
use conexiones\api\PokeApi;
use modelos\Equipo;
use PDO;
use Exception;

class Usuario {
    public PDO $pdo;
    public PokeApi $pokeapi;
    private int $id;
    private string $username;
    private string $password; // sin hashear, la hasheada va en los metodos


    /**
     * Recoge objeto bbdd para poder acceder a su atributo PDO y así poder hacer queries en el resto de metodos
     * @param Bbdd $bbdd
     */
    public function __construct(PDO $pdo, PokeApi $pokeapi) {
        $this->pdo = $pdo;
        $this->pokeapi = $pokeapi;
    }









    /**
     * Funcion QUE FUNCIONA
     * con sus 3 equipos en null
     * y con sus 18 (3x6) entidades equipo-pokemon tambien en null
     */
    public function insertarUserCompleto(string $name, string $pass): bool {
        $confirmacionCreacionEquipos = false;
        $insercionConfirmada = false;
        try {
            $this->pdo->beginTransaction();
            if (!$this->userExiste($name)) {
                $pass = password_hash($pass, PASSWORD_DEFAULT);
                $q = $this->pdo->prepare("INSERT INTO Usuario (username, password) VALUES (:username, :password);");
                $q->bindParam(':username', $name, PDO::PARAM_STR);
                $q->bindParam(':password', $pass, PDO::PARAM_STR);
                $insercionConfirmada = $q->execute();
                if ($insercionConfirmada) {
                    $id = $this->getId($name);
                    if ($id > 0) { // Asegura que se obtuvo un id válido
                        $e = new Equipo($this->pdo, $this->pokeapi);
                        $confirmacionCreacionEquipos = $e->crearEquipos($id);
                        if ($confirmacionCreacionEquipos) {
                            $matrizEquiposDelUser = $e->verEquipos($name);
                            $ids_equipos = array_column($matrizEquiposDelUser, 'id');
                            $ep = new EquipoPokemon($this->pdo, $this->pokeapi);
                            $confirmacionCreacionEntidadesEquipos_Pokemon = $ep->crearTodosEquipos_pokemon($ids_equipos);
                        }
                    }
                }
            }
            if ($insercionConfirmada && $confirmacionCreacionEquipos && $confirmacionCreacionEntidadesEquipos_Pokemon) {
                $this->pdo->commit();
                return true;
            } else {
                $this->pdo->rollback();
                return false;
            }
        } catch (Exception $e) {
            $this->pdo->rollBack();
            return false;
        }
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
     * TESTEADA. FUNCIONA
     * funcion para usar en la insercion de User y
     * para sacar el parametro necesario para la funcion de creacion de equipos
     * que está en la entidad Equipo
     * @param string username
     * @return int $id que si no encuentra, será 0
     */
    public function getId(string $username): int {
        $id = 0; //esto equivaldría a error, user no encontrado
        $q2 = $this->pdo->prepare('SELECT id FROM Usuario WHERE username = :username');
        $q2->bindParam(':username', $username, PDO::PARAM_STR);
        if ($q2->execute()) {
            $resultado = $q2->fetch();
            if ($resultado)
                $id = $resultado['id'];
        }
        return $id;
    }

    public function getUsernameWithId(int $id_user): string {
        $username = null;
        $q2 = $this->pdo->prepare('SELECT username FROM Usuario WHERE id = :id_user');
        $q2->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        if ($q2->execute()) {
            $resultado = $q2->fetch();
            if ($resultado)
                $username = $resultado['username'];
        }
        return $username;
    }




    /**
     * FUNCIONA PERO QUEDA MEJORARLA, POR EL HASHEADO
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

    /*
    Quedan hacer comprobaciones con respecto al hasheado
    Y después, funciones que comprueben longitud de la contraseña mínimo
    */




        /**
     * FUNCIONA pero ya no se usa. No borrar hasta que se sepa innecesaria
     * comprueba si el user que queremos meter existe
     * si no existe, lo crea, junto a sus 3 equipos automaticamente.
     * @deprecated version of insertarUserCompleto()
     * @param string $name es un username
     * @param string $pass es la password que quiere insertar en bbdd
     * @return bool true si lo consiguio
     */
    public function insertarUser(string $name, string $pass): bool {
        $confirmacionCreacionEquipos = false;
        $insercionConfirmada = false;
        try {
            $this->pdo->beginTransaction();
            if (!$this->userExiste($name)) {
                $pass = password_hash($pass, PASSWORD_DEFAULT);
                $q = $this->pdo->prepare("INSERT INTO Usuario (username, password) VALUES (:username, :password);");
                $q->bindParam(':username', $name, PDO::PARAM_STR);
                $q->bindParam(':password', $pass, PDO::PARAM_STR);
                $insercionConfirmada = $q->execute();
                if ($insercionConfirmada) {
                    $id = $this->getId($name);
                    if ($id > 0) { // Asegura que se obtuvo un id válido
                        $equipo = new Equipo($this->pdo, $this->pokeapi);
                        $confirmacionCreacionEquipos = $equipo->crearEquipos($id);
                    }
                }
            }
            if ($insercionConfirmada && $confirmacionCreacionEquipos) {
                $this->pdo->commit();
                return true;
            } else {
                $this->pdo->rollback();
                return false;
            }
        } catch (Exception $e) {
            $this->pdo->rollBack();
            return false;
        }
    }
}
