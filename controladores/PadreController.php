<?php

namespace controladores;

use conexiones\bbdd\Bbdd;
use modelos\Sesion;
use PDO;

class PadreController {
    public PDO $pdo;
    public Sesion $s;

    /**
     * Con esta var los controladores hijos pueden saber ya si ya hay un string con algo en $_SESSION['username']
     */
    public bool $userLogeado;

    public function __construct() {
        $objBbdd = new Bbdd();
        $this->s = new Sesion();
        if (!$this->s->sessionStarted()) {
            $this->s->crear();
        }
        $this->pdo = $objBbdd->conexionBbdd;
        $this->pdo->exec("USE pokedex");
        $this->userLogeado = $this->s->userLogeado(); // 
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

        //complicado pero esto es lo que hace que $content funcione
        ob_start();
        include_once(__ROOT__ . DIRECTORY_SEPARATOR . "public" . DIRECTORY_SEPARATOR . "vistas" . DIRECTORY_SEPARATOR . $page);
        $content = ob_get_clean();
        include_once(__ROOT__ . DIRECTORY_SEPARATOR . "public" . DIRECTORY_SEPARATOR . "vistas" . DIRECTORY_SEPARATOR . "estructura_main.php");
    }
}
