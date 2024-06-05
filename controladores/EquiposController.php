<?php

namespace Controladores;

use controladores\PadreController;
use modelos\Equipo;
use modelos\EquipoPokemon;
use modelos\Pokemon;

//SIN TERMINAR
class EquiposController extends PadreController {
    public function misEquipos() {
        if (!$this->userLogeado)
            header("Location: login");

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
            echo json_encode(['removal_success' => true]);
        } else {
            echo json_encode(['removal_success' => false, 'message' => 'Error removing pokemon from team']);
        }
    }

    /**
     * Explicacion detallada: El user clicka en el enlace de renombrar de la vista.
     * El script js ejecuta la apertura del modal recogiendo ese click.
     * Hay otra funcion js esperando el click de cierre del modal tambien.
     * Y las otras funciones: una que recoge el click de enviar y el input que puso el user,
     * que ademas recoge el atributo data-id del <a> y se lo coloca al input hidden del modal.
     * Al pulsar el boton de submit, se ejecuta la funcion que conecta con el controlador
     * mediante fetch() ajax, que recoge tambien el valor del input
     * y le envia el nombre nuevo y el id necesario mediante post.
     */
    public function renombrarEquipo() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents('php://input'), true);
            $equipoId = $data['id_equipo_a_renombrar'];
            $nuevoNombre = $data['nuevoNombre'];
            //$equipoId = $_POST['equipoId'];
            //$nuevoNombre = $_POST['nuevoNombre'];
            $e = new Equipo($this->pdo, $this->pokeapi);
            if ($e->renombrarEquipo($equipoId, $nuevoNombre)) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Error al renombrar el equipo']);
            }
        }
    }



}
