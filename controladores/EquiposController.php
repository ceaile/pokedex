<?php

namespace Controladores;

use Router\Enrutador;
use controladores\PadreController;

use modelos\Equipo;

class EquiposController extends PadreController {
    public function misEquipos() { //deberia obtener de parametros la sesion
        //if ($_SERVER['REQUEST_METHOD'] !== 'GET')
        //  exit; //set 404

        $this->renderView('misequipos.php', [
            'title' => "Mis Equipos Pokémon",
        ]);
    }

    private function quitarPokemon() {
    }
    private function renombrarEquipo() {
    }
}
