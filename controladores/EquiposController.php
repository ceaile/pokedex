<?php

namespace Controladores;

use Router\Enrutador;
use controladores\PadreController;
use modelos\Equipo;
use modelos\EquipoPokemon;

class EquiposController extends PadreController {
    public function misEquipos() { 
        if (!$this->userLogeado) header("Location: login");
        $username = $this->s->obtenerSesion('username');
        $e = new Equipo($this->pdo);
        $ep = new EquipoPokemon($this->pdo);

        $equiposDeUsuario = $e->verEquipos($username);
        $queryCompleta = $ep->sacarDatosEquiposPokemon($username);
        
        
        //SIN TERMINAR, NI EL CONTROLADOR NI LAS VISTAS MISEQUIPOS.PHP DE MOMENTO FUNCIONAN
       
        
     


        $this->renderView('misequipos.php', [
            'title' => "My Pokémon Teams",
            //aqui iran las variables de verdad para la vista:
            
            //Esto de aqui de momento es copiado de fichacontroller de ejemplo, sera borrado
            'datosCompletos' => $queryCompleta,
            'equipos' => $equiposDeUsuario,
        ]);
    }


    private function quitarPokemon() {
    }
    private function renombrarEquipo() {
    }
}
