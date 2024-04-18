<?php
namespace Controladores;
use conexiones\bbdd\Bbdd;
Use PDO;
//si los otros controladores no fueran estaticos
class PadreController {
    public PDO $pdo;

public function __construct(){
    $objBbdd = new Bbdd();
    $this->pdo = $objBbdd->conexionBbdd;
    $this->pdo->exec("USE pokedex");
    //iniciarSesion()  --> session_start()  ???
    //ver si esta logeado el user, etc
    //
}
 


    //funcion renderView()
    public function renderView($page, $params = []) {
        foreach ($params as $param => $value) {
            $$param = $value;
        }
    
        ob_start();
        include_once(__ROOT__.DIRECTORY_SEPARATOR."public".DIRECTORY_SEPARATOR."vistas".DIRECTORY_SEPARATOR.$page);
        $content = ob_get_clean();
        include_once(__ROOT__.DIRECTORY_SEPARATOR."public".DIRECTORY_SEPARATOR."vistas".DIRECTORY_SEPARATOR."_layout.php");
    }

}

?>