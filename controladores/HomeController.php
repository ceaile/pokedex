<?php

namespace Controladores;

use Router\Enrutador;
use controladores\PadreController;

//use modelos\Usuario;   cuando use una entidad pues la añado

class HomeController extends PadreController {
    public function home() {
        if ($_SERVER['REQUEST_METHOD'] !== 'GET')
            exit; //set 404

        $this->renderView('home.html', [
            'title'=> "Mis Equipos Pokémon",
        ]); //que en futuro seguramente sera home.html o listaPokemon.html .php $router->renderView('home.php', ['title' => 'Pokédex Home']);
    }

}

