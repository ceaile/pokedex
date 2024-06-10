<?php
namespace Controladores;

use controladores\PadreController;
use modelos\Pokemon;

class HomeController extends PadreController {
    public function home() {
        $pokedex = $this->crearPokedex();
        /* Comprueba si hay datos en caché
        $cacheFolder = '../public/cache';
        $files = scandir($cacheFolder);
        $hayCache = count($files) > 2; */
        $this->renderView('home.php', [
            'title' => "Lista Pokédex",
            'id_primer_pokemon' => 906,
            'id_ultimo_pokemon' => 1205,
            'pokedex' => $pokedex,
            //'hayCache' => $hayCache, //no se esta usando al final
        ]);
    }


    public function buscar() {
        $pokedex = $this->crearPokedex();
        if (isset($_GET['search'])) {
            $search = $_GET['search'] ?? '';
            if ($search !== '') {
                if (!is_numeric($search)) {
                    //BUSCAR POR TIPO
                    if (strpos($search, 'type ') === 0) { //mira si 'type' está al principio del string
                        $type = substr($search, 5); // quita de la busqueda el str 'type '
                        $pokedex = array_filter($pokedex, function ($pokemon) use ($type) {
                            return in_array(strtolower($type), array_map('strtolower', $pokemon['tipos']));
                        });

                    } else { //BUSCAR POR NOMBRE DE POKEMON
                        $pokedex = array_filter($pokedex, function ($pokemon) use ($search) {
                            return strpos(strtolower($pokemon['nombre']), strtolower($search)) !== false;
                        });
                    }

                    //BUSCAR POR ID
                } else if (is_numeric($search)) { //no un else normal por si alguien mete un caracter raro que no sea ni letra ni numero
                    $pokedex = array_filter($pokedex, function ($pokemon) use ($search) {
                        return $pokemon['id'] == $search; // Corrected line
                    });
                }

            }
        }
        $this->renderView('home.php', [
            'title' => "Your Pokémon Search",
            'pokedex' => $pokedex,
        ]);
    }


    /**
     * Para que pueda usarse tanto en el home como en el buscador
     */
    private function crearPokedex() {
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
        return $pokedex;
    }

    public function notFound() {
        $this->renderView('404.php', [
            'title' => "Page Not Found",
        ]);
    }
}
