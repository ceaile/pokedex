<?php

namespace Controladores;

use Router\Enrutador;
use controladores\PadreController;

//use modelos\Usuario;   cuando use una entidad pues la añado

class HomeController extends PadreController {
    public function home() {
        $this->renderView('home.php', [
            'title' => "Lista Pokédex",
        ]); //que en futuro seguramente sera home.html o listaPokemon.html .php $router->renderView('home.php', ['title' => 'Pokédex Home']);
    }


    public function notFound() {
        $this->renderView('404.php', [
            'title' => "Page Not Found",
        ]);
    }
}
