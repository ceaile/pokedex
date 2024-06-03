<?php

namespace Controladores;

use controladores\PadreController;
use modelos\Equipo;
use modelos\EquipoPokemon;
use modelos\Pokemon;

//SIN TERMINAR, NI EL CONTROLADOR NI LAS VISTAS MISEQUIPOS.PHP DE MOMENTO FUNCIONAN
class EquiposController extends PadreController {
    public function misEquipos() {
        if (!$this->userLogeado) header("Location: login");

        $e = new Equipo($this->pdo);
        $ep = new EquipoPokemon($this->pdo, $this->pokeapi);

        //array de equipos, con su id y su nombre cada uno, y sus pokemon dentro etc
        $equiposDeUsuario = $ep->getBucleEquipoConPokemon($this->s->obtenerSesion('username'));

        /* nota: añadir datos de la pokeapi al array para acceder??
            por cada pokemon llamar a la api y añadir
            en el array de pokemon los datos de nombre, sprite, etc
            tengo que llamar a la api si el id pokemon no es 0.
            $PokeApi = new PokeApi();
            $PokeApi->construirLlamada(1);
            $PokeApi->llamarApi();
            */
        $p = new Pokemon($this->pokeapi);













        $this->renderView('misequipos.php', [
            'title' => "My Pokémon Teams",
            //aqui iran las variables de verdad para la vista:

            //Esto de aqui de momento es copiado de fichacontroller de ejemplo, sera borrado
            'equipos' => $equiposDeUsuario,

        ]);
    }


    public function quitarPokemon() {
        return "<?= 'esto quitara pokemon' ?>";
    }

    public function renombrarEquipo() {
    }
}
