<?php

namespace Controladores;

use controladores\PadreController;
use Router\Enrutador;
use modelos\Sesion;
use modelos\Equipo;
use modelos\EquipoPokemon;

class FichaController extends PadreController {

    /**
     * saca los id de los equipos para poder ponerlos en el html del modal ??
     * saca los nombres de los equipos para poder ponerlos en el html
     * 
     */
    public function verFicha() {
        $s = new Sesion();
        if ($s->existe('username')){
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                $id_pokemon = $_GET['id_pokemon'];
                $e = new Equipo($this->pdo);
                $equiposDeUsuario = $e->verEquipos($s->obtenerSesion('username'));
                
                $nombresEquipos = [];
                $idsEquipos = [];
                foreach ($equiposDeUsuario as $equipo) {
                    $nombresEquipos[] = $equipo['nombre'];
                    $idsEquipos[] = $equipo['id'];
                }
        
                $arrayNombresEquiposIndexado = array_values($nombresEquipos);
                $arrayIdsEquiposIndexado = array_values($idsEquipos);
        
                $this->renderView('ficha.php', [
                    'title' => "Pokemon",
                    'id_pokemon' => $id_pokemon,
                    'idEquipo1' => $arrayIdsEquiposIndexado[0],
                    'idEquipo2' => $arrayIdsEquiposIndexado[1],
                    'idEquipo3' => $arrayIdsEquiposIndexado[2],
                    'nombreEquipo1' => $arrayNombresEquiposIndexado[0],
                    'nombreEquipo2' => $arrayNombresEquiposIndexado[1],
                    'nombreEquipo3' => $arrayNombresEquiposIndexado[2],
        
                ]);
                } else{
                    header("Location: misequipos");
                }
        } else {
            header("Location: login");
        }

    }



    /**
     * 
     */
    public function anadirPokemon() {
        //asociar url para usar el action
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_pokemon = $_POST['id_pokemon'];
            $array_equipos = $_POST['equipos'];
        }
        $ep = new EquipoPokemon($this->pdo);
        foreach ($array_equipos as $id_equipo) {
            if ($ep->crearEquipoPokemon($id_equipo, $id_pokemon)) {
                $arrayConfirmaciones[] = true;
            }
        }
        if (!in_array(false, $arrayConfirmaciones)) {
            header("Location: home");
        } else {
            header("Location: /ficha?id_pokemon=$id_pokemon");
        }
    }
}
