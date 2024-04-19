<?php
namespace Controladores;
use conexiones\bbdd\Bbdd;
use modelos\Sesion;
Use PDO;
//si los otros controladores no fueran estaticos
class PadreController {
    public PDO $pdo;

    /**
     * Con esta var los controladores hijos pueden saber ya si ya hay un string con algo en $_SESSION['username']
     */
    public bool $userLogeado;

public function __construct(){
    $objBbdd = new Bbdd();
    $objSession = new Sesion();
    $this->pdo = $objBbdd->conexionBbdd;
    $this->pdo->exec("USE pokedex");
    $userLogeado = $objSession->userLogeado(); // 
}
 


/**
 * Funcion renderview() como la que tenia Symfony pero casera
 * No me preguntes porque es sacada de por ahí
 * No tocar!!!!!
 */
    public function renderView($page, $params = []) {
        foreach ($params as $param => $value) {
            $$param = $value;
        }
    
        ob_start();
        include_once(__ROOT__.DIRECTORY_SEPARATOR."public".DIRECTORY_SEPARATOR."vistas".DIRECTORY_SEPARATOR.$page);
        $content = ob_get_clean();
        include_once(__ROOT__.DIRECTORY_SEPARATOR."public".DIRECTORY_SEPARATOR."vistas".DIRECTORY_SEPARATOR."estructura_main.php");
    }

}

?>