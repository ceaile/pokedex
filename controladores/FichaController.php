<?php

namespace Controladores;

use controladores\PadreController;
use Router\Enrutador;
use modelos\Sesion;
use modelos\Equipo;
use modelos\Pokemon;
use modelos\EquipoPokemon;

class FichaController extends PadreController {

    /**
     * saca los id de los equipos para poder ponerlos en el html del modal ??
     * saca los nombres de los equipos para poder ponerlos en el html
     * 
     * 
     * sacar datos del pokemon e insertarlos para acceder desde la vista
     */
    public function verFicha() {
        if (!$this->userLogeado) header("Location: login");
        if ($_SERVER["REQUEST_METHOD"] != "GET") header("Location: myteams");

        $id_pokemon = $_GET['id_pokemon'];
        $p = new Pokemon($this->pokeapi);
        $p->llamarPokemon($id_pokemon);
        $pokemon =
            [
                'id' => $id_pokemon,
                'nombre' => $p->getNombre(),
                'tipos' => $p->getTipos(), //str array
                'art' => $p->getArt(),

            ];
        $e = new Equipo($this->pdo);
        $ep = new EquipoPokemon($this->pdo, $this->pokeapi); /*
        $equiposDeUsuario = $e->verEquipos($this->s->obtenerSesion('username'));
        $nombresEquipos = [];
        $idsEquipos = [];
        foreach ($equiposDeUsuario as $equipo) {
            $nombresEquipos[] = $equipo['nombre'];
            $idsEquipos[] = $equipo['id'];
        }
        $arrayNombresEquiposIndexado = array_values($nombresEquipos);
        $arrayIdsEquiposIndexado = array_values($idsEquipos);*/
        $equiposDeUsuario = $ep->getBucleEquipoConPokemon($this->s->obtenerSesion('username'));
        $this->renderView('ficha.php', [
            'title' => "Pokemon",
            'id_pokemon' => $id_pokemon,/*
            'idEquipo1' => $arrayIdsEquiposIndexado[0],
            'idEquipo2' => $arrayIdsEquiposIndexado[1],
            'idEquipo3' => $arrayIdsEquiposIndexado[2],
            'nombreEquipo1' => $arrayNombresEquiposIndexado[0],
            'nombreEquipo2' => $arrayNombresEquiposIndexado[1],
            'nombreEquipo3' => $arrayNombresEquiposIndexado[2],*/
            'pokemon' => $pokemon,
            'equipos' => $equiposDeUsuario, //bucle inmenso perfecto con todo que uso en mis equipos
        ]);
    }



    /**
     * comprueba los checkbox primero, si estan marcados o no. 
     * si lo está, compara el id de ese array
     * con el id del otro array que contiene todos los datos de mis equipos y sus pokemon,
     * porque si esta marcado el checkbox, tiene un dato, y si no esta null.
     * si encuentra un hueco, insertará el pokemon ahí.
     */
    public function anadirPokemon() {
        $ep = new EquipoPokemon($this->pdo, $this->pokeapi);
        $e = new Equipo($this->pdo);

        if (!$this->userLogeado) header("Location: login");

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_pokemon = $_POST['id_pokemon']; //pokemon de la ficha
            $array_equipos_checkbox = $_POST['equipos'];
        }

        $equiposDeUsuario = $ep->getBucleEquipoConPokemon($this->s->obtenerSesion('username')); //se queda, y se borra el resto

        foreach ($array_equipos_checkbox as $id_equipo) {
            if ($id_equipo != null) { //o sea, si el checkbox esta marcado
                //este foreach busca los huecos en la bbdd donde insertar/updatear
                foreach ($equiposDeUsuario as $equipo) {
                    if ($equipo['id'] == $id_equipo) {
                        foreach ($equipo['seisPokemons'] as $pokemon) {
                            if ($pokemon['id_pokemon'] == 0) {
                                if ($ep->insertarPokemon($pokemon['id_equipopokemon'], $id_pokemon)) {
                                    break; //hace la insercion 1 vez, y comprueba el siguiente checkbox
                                }
                            }
                        }
                    }
                }
            }
        }
        header("Location: home");
        exit();


        //foreach ($array_equipos_checkbox as $id_equipo) { //[1, 2, 3]
        //aqui es donde tiene que haber logica
        /*if ($ep->crearEquipoPokemon($id_equipo, $id_pokemon)) {
                $arrayConfirmaciones[] = true;
            }*/
        /*if (!in_array(false, $arrayConfirmaciones)) {
            header("Location: home"); //cambio posterior a otra url, solo esta asi para saber cuando funciona y cuando no
        } else {
            header("Location: /card?id_pokemon=$id_pokemon");
        }*/
    }
}
