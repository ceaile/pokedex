<?php

namespace Controladores;

use Router\Enrutador;
use controladores\PadreController;
//use modelos\Usuario;   cuando use una entidad pues la añado

class HomeController extends PadreController{
    public function home() {
        if($_SERVER['REQUEST_METHOD'] !== 'GET') exit; //set 404
        
        $variableLocal = null; //ejemplo
        $this->renderView('conexionApi.html', [
            'nombreVariable' => $variableLocal,
            'otraVariable' => $variableLocal,
        ]); //que en futuro seguramente sera home.html o listaPokemon.html .php $router->renderView('home.php', ['title' => 'Pokédex Home']);
    
    }


}

?>