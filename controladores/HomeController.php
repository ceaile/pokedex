<?php

namespace Controladores;

use Router\Enrutador;
use controladores\PadreController;
use modelos\Pokemon;

//use modelos\Usuario;   cuando use una entidad pues la añado

class HomeController extends PadreController {
    public function home() {
        $i = 0;
        $pokedex=[];
        $p = new Pokemon($this->pokeapi);
        for ($id = 906; $id < 1026; $id++) {
            $p->llamarPokemon($id);
            $pokedex[$i] =
            [
                'id' => $id,
                'nombre' => $p->getNombre(),
                'tipos' => $p->getTipos(), //str array
                'art' => $p->getArt(),
                
            ];
            $i++;
        }

        $this->renderView('home.php', [
            'title' => "Lista Pokédex",
            'id_primer_pokemon' => 906,
            'id_ultimo_pokemon' => 1205,
            'pokedex' => $pokedex,

        ]); 
    }


    public function notFound() {
        $this->renderView('404.php', [
            'title' => "Page Not Found",
        ]);
    }
}
