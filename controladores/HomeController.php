<?php

namespace Controladores;

use Router\Enrutador;
use controladores\PadreController;
use modelos\Pokemon;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use GuzzleHttp\Exception\RequestException;

class HomeController extends PadreController {
    public function home() {

        $pokedex = [];

        for ($id = 906; $id < 1026; $id++) {
            $pokemon = new Pokemon($this->pokeapi);
            $pokemon->llamarPokemon($id);
            $pokedex[] = [
                'id' => $pokemon->getId(),
                'nombre' => $pokemon->getNombre(),
                'tipos' => $pokemon->getTipos(),
                'art' => $pokemon->getArt(),
            ];
        }

        /*
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
                'art' => "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/".$id.".png",
                
            ];
            $i++;
        }*/

        // Comprueba si hay datos en caché
        $cacheFolder = '../public/cache';
        $files = scandir($cacheFolder);
        $hayCache = count($files) > 2; 

        $this->renderView('home.php', [
            'title' => "Lista Pokédex",
            'id_primer_pokemon' => 906,
            'id_ultimo_pokemon' => 1205,
            'pokedex' => $pokedex,
            'hayCache' => $hayCache, //no se esta usando aun
        ]);
    }

    public function notFound() {
        $this->renderView('404.php', [
            'title' => "Page Not Found",
        ]);
    }
}
