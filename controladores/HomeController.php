<?php

namespace Controladores;

use Router\Enrutador;
//use modelos\Usuario;   cuando use una entidad pues la añado

class HomeController {
    public static function home(Enrutador $router) {
        if($_SERVER['REQUEST_METHOD'] !== 'GET') exit; //set 404
        
        $variableLocal = null; //ejemplo
        $router->renderView('conexionApi.html', [
            'nombreVariable' => $variableLocal,
            'otraVariable' => $variableLocal,
        ]); //que en futuro seguramente sera home.html o listaPokemon.html .php $router->renderView('home.php', ['title' => 'Pokédex Home']);
    
    }


}