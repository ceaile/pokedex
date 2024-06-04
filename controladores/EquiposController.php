<?php

namespace Controladores;

use controladores\PadreController;
use modelos\Equipo;
use modelos\EquipoPokemon;
use modelos\Pokemon;

//SIN TERMINAR
class EquiposController extends PadreController {
    public function misEquipos() {
        if (!$this->userLogeado) header("Location: login");

        $e = new Equipo($this->pdo, $this->pokeapi);
        $ep = new EquipoPokemon($this->pdo, $this->pokeapi);

        //array de equipos, con su id y su nombre cada uno, y sus pokemon dentro etc
        $equiposDeUsuario = $ep->getBucleEquipoConPokemon($this->s->obtenerSesion('username'));

        $p = new Pokemon($this->pokeapi);

        $this->renderView('misequipos.php', [
            'title' => "My Pokémon Teams",
            'equipos' => $equiposDeUsuario,

        ]);
    }


    public function quitarPokemon() {
        $ep = new EquipoPokemon($this->pdo, $this->pokeapi);
        $id = $_GET['id']; //id
        if ($ep->quitarPokemonDeEquipo($id)) {
            header("Location: myteams");
        } else{
            header("Location: home");
        }
    }

    public function renombrarEquipo() {
        return "<?= 'esto renombrará el equipo de pokemon' ?>";
    }
}
