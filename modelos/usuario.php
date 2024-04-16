<?php

namespace modelos;
use conexiones\bbdd\Bbdd;
use PDO;
//use App\conexiones\bbdd\conexionBbdd;
//require_once '../conexiones/bbdd/conexionBbdd.php'; //recoge $conexionBbdd (es un objeto PDO)
use Exception;

class Usuario {
    public Bbdd $bbdd;
    private int $id;
    private string $username;
    private string $password; // hashed???? habra que cambiar los metodos


/**
 * 
 */
    public function __construct(Bbdd $bbdd) {
        $this->bbdd=$bbdd;
    }


//ejemplo para mario de lo que me referia
    public function insertarUser(string $name, string $pass) {
        $this->bbdd->conexionBbdd->exec("USE pokedex"); //fix
        $q = $this->bbdd->conexionBbdd->prepare("INSERT INTO Usuario (username, password) VALUES (:username, :password);");
        $q->bindParam(':username', $name, PDO::PARAM_STR);
        $q->bindParam(':password', $pass, PDO::PARAM_STR);
        $q->execute();
    }



    private function getId():int { return $this->id; }

    public function getUsername():string { return $this->username; }

    private function setUsername($nuevoUsername):void { $this->username=$nuevoUsername; }

    /**
     * Cambia el nombre de user en la bbdd usando el setter
     * utiliza la conexion a bbdd
     * crea queries con los parametros bindeados para updatear la bbdd
     * @param string $nuevoNombre
     * @return bool Si retorna false es que el username es el mismo y por lo tanto no puede cambiarlo
     */
    public function cambiarUsername($nuevoNombre, $id):bool {
        global $conexionBbdd;
        if ($this->username != $nuevoNombre){
           $this->setUsername($nuevoNombre);
            $query = $conexionBbdd->prepare("UPDATE Usuarios SET username = :username WHERE id = :id");
            $query->bindParam(':username', $nuevoNombre);
            $query->execute();
            return true;
        } else {
            return false;
        } 
    }


    public function testCambioUsername(){
        global $conexionBbdd;
        return $conexionBbdd;
    }


    public function getPassword():string { return $this->password; }

  
    private function setPassword($nuevaPassword):void {
        $this->password = $nuevaPassword;
    }

    public function cambiarContrasena($nuevaPassword):bool{
        //pdo global? la recoge del archivo bbdd

        if ($this->password != $nuevaPassword){
            $this->setPassword($nuevaPassword);
             return true;
         } else {
             return false;
         }
    }


}
