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
        //$nombres_equipos = array_column($equiposDeUsuario, 'nombre');
        //$ids_equipos = array_column($equiposDeUsuario, 'id');
        //$queryCompleta = $ep->sacarDatosEquiposPokemon($username);
        foreach($equiposDeUsuario as $equipo) {
            $pokemonDelEquipo = $ep->saberPokemonDelEquipo($equipo['id']);

            foreach($pokemonDelEquipo as $pokemon) {
                $pokemon = [
                    'id_equipopokemon' => $ep->getIdEquipopokemon($equipo['id'], $pokemon['id']),
                ];
            }
            
            $equiposDeUsuario[] = $pokemonDelEquipo; //meter el array de 6 pokemon dentro del array de equipos
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
