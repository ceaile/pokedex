<?php
namespace modelos;

use conexiones\bbdd\Bbdd;
use modelos\Equipo;
use PDO;
use Exception;

class Usuario {
    public Bbdd $bbdd;
    private int $id;
    private string $username;
    private string $password; // hashed???? habra que cambiar los metodos


    /**
     * Recoge objeto bbdd para poder acceder a su atributo PDO y así poder hacer queries en el resto de metodos
     * @param Bbdd $bbdd
     */
    public function __construct(Bbdd $bbdd) {
        $this->bbdd = $bbdd;
    }


    /**
     * Inserta user en bbdd
     * No recoge param $id porque es autoincremental
     * COMPROBADA QUE FUNCIONA
     * de momento si el user ya existe devuelve una excepcion
     * en el futuro: usa otra funcion que compruebe primero que existe e user
     * y hashea la contraseña antes de insertarla en bbdd
     * 
     * Cuando se crea un usuario, se crean los 3 equipos automaticamente
     * @param string $name es un username
     * @param string $pass es la password que quiere insertar en bbdd
     */
    public function insertarUser(string $name, string $pass): bool {
        $pdo =$this->bbdd->conexionBbdd;
        $pdo->exec("USE pokedex"); //fix?
        //ejecutar funcion que aun no existe de comprobar si user existe
        $q = $pdo->prepare("INSERT INTO Usuario (username, password) VALUES (:username, :password);");
        $q->bindParam(':username', $name, PDO::PARAM_STR); //usado en la siguiente query
        $q->bindParam(':password', $pass, PDO::PARAM_STR);
        $confirmacionInsercion = $q->execute();
        if ($confirmacionInsercion) {
            //sacar el id del user que acabamos de crear para poder meterlo en esta funcion de crear equipos
            $q2 = $pdo->prepare('SELECT id FROM Usuario WHERE username = :username');
            $q2->execute(); //deberia salir bien... = true
            $id = $q2->fetch(); //parametro

            $equipo = new Equipo($this->bbdd);
            if ($equipo->crearEquipos($id)) {
                $confirmacionCreacionEquipos = true;
            }
        }
        return $confirmacionCreacionEquipos && $confirmacionInsercion;
    }


    //



    //funcion de comprobacion de que el usuario no existe primero para antes de insertar?
    //public function userExiste(string $name):bool{}

    /*
        private function getId():int { return $this->id; }
        public function getUsername():string { return $this->username; }
        private function setUsername($nuevoUsername):void { $this->username=$nuevoUsername; }
    */

    /**
     * No en funcionamiento, ni en uso
     * ni siquiera terminada!!!! olvidar por ahora!!!
     * Cambia el nombre de user en la bbdd usando el setter
     * utiliza la conexion a bbdd
     * crea queries con los parametros bindeados para updatear la bbdd
     * @param string $nuevoNombre
     * @return bool Si retorna false es que el username es el mismo y por lo tanto no puede cambiarlo
     */
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





    public function getPassword(): string {
        return $this->password;
    }


    /**
     * no realmmente necesaria
     */
    private function setPassword($nuevaPassword): void {
        $this->password = $nuevaPassword;
    }

    /**
     * no realemente necesaria
     */
    public function cambiarContrasena($nuevaPassword): bool {
        //pdo global? la recoge del archivo bbdd

        if ($this->password != $nuevaPassword) {
            $this->setPassword($nuevaPassword);
            return true;
        } else {
            return false;
        }
    }


}
