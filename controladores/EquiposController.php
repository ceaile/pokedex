<?php

namespace Controladores;

use Router\Enrutador;
use controladores\PadreController;

use modelos\Equipo;

class EquiposController extends PadreController {
    public function misEquipos() { 
        if (!$this->userLogeado) header("Location: login");
        $this->renderView('misequipos.php', [
            'title' => "My Pokémon Teams",
        ]);
    }

    private function quitarPokemon() {
    }
    private function renombrarEquipo() {
    }
}
