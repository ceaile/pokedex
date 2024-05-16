<?php

namespace Controladores;

use Router\Enrutador;
use controladores\PadreController;
use modelos\Equipo;
use modelos\EquipoPokemon;

//SIN TERMINAR, NI EL CONTROLADOR NI LAS VISTAS MISEQUIPOS.PHP DE MOMENTO FUNCIONAN
class EquiposController extends PadreController {
    public function misEquipos() { 
        if (!$this->userLogeado) header("Location: login");
        $username = $this->s->obtenerSesion('username');
        $e = new Equipo($this->pdo);
        $ep = new EquipoPokemon($this->pdo);

        $equiposDeUsuario = $e->verEquipos($username); //array de equipos, con su id y su nombre cada uno

        $i = 0;
        foreach($equiposDeUsuario as $equipo) {
            if ($equiposDeUsuario[$i]['nombre']==null){
                $equiposDeUsuario[$i]['nombre'] = "My team ".$i+1;
            }
            $pokemonDelEquipo = $ep->saberPokemonDelEquipo($equipo['id']);
            $equiposDeUsuario[$i]['seisPokemons'] = $pokemonDelEquipo; //meter el array de 6 pokemon dentro del array de equipos
            $i++;
            /*
            por cada pokemon llamar a la api y añadir
            en el array de pokemon los datos de nombre, sprite, etc
            tengo que llamar a la api si el id pokemon no es 0
            */
        }
        

        
        
     


        $this->renderView('misequipos.php', [
            'title' => "My Pokémon Teams",
            //aqui iran las variables de verdad para la vista:
            
            //Esto de aqui de momento es copiado de fichacontroller de ejemplo, sera borrado
            'equipos' => $equiposDeUsuario,

        ]);
    }


    private function quitarPokemon() {
    }
    private function renombrarEquipo() {
    }
}
