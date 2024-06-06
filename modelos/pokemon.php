<?php

namespace modelos;

use conexiones\bbdd\Bbdd;
use conexiones\api\PokeApi;
use PDO;
use Exception;

/**
 * Llama a la pokeapi como si lo hiciera a BBDD
 */
class Pokemon {
    public PokeApi $pokeapi;
    public PDO $pdo;
    private $respuesta;
    private int $id;
    private string $nombre;
    private string $descripcion; //tengo que hacer una llamada aparte
    private string $art;
    private string $sprite;
    private array $tipos; //
    private string $grito;
    private int $altura;
    private int $peso;

    public function __construct(PokeApi $pokeapi/*, PDO $pdo = null*/) {
        $this->pokeapi = $pokeapi;
        //if (!$pdo) $this->pdo = $pdo;
    }
/* //uso con curl
    public function llamarPokemon(int $id_pokemon): void {
        $this->pokeapi->construirLlamada($id_pokemon);
        $this->pokeapi->llamarApi();
        $this->setRespuesta($this->pokeapi->response);
        $this->setPokemonInfo();
        $this->setId($id_pokemon);
    }*/

    //uso con guzzle
    public function llamarPokemon(int $id_pokemon): void {
        $this->pokeapi->construirLlamada($id_pokemon);
        $promise = $this->pokeapi->construirLlamada($id_pokemon); // Obtener la promesa
        $response = $promise->wait(); // Esperar a que se resuelva la promesa

        if ($response) {
            $this->setRespuesta(json_decode($response->getBody(), true));
            $this->setPokemonInfo();
            $this->setId($id_pokemon);
        }
    }
 

    private function setPokemonInfo() {
        $this->setNombre($this->respuesta['name']);
        $this->setPeso($this->respuesta['weight']);
        $this->setAltura($this->respuesta['height']);
        $this->setTipos($this->respuesta['types']); //queda procesar esto
        $this->setArt($this->respuesta['sprites']['other']['official-artwork']['front_default']); //https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/$id.png";
        $this->setSprite($this->respuesta['sprites']['front_default']);
        //$this->setDescripcion($this->respuesta['species']['flavor_text_entries']);
        $this->setGrito($this->respuesta['cries']['latest']); //.ogg
    }




    // Getter and Setter for $respuesta
    public function getRespuesta() {
        return $this->respuesta;
    }

    public function setRespuesta($respuesta): void {
        $this->respuesta = $respuesta;
    }

    // Getter and Setter for $id
    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    // Getter and Setter for $nombre
    public function getNombre(): string {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }

    // Getter and Setter for $descripcion
    public function getDescripcion(): string {
        return $this->descripcion;
    }


    /**
     * @param array response['flavor_text_entries'] matriz
     */
    public function setDescripcion($entries): void {
        foreach ($entries as $entry) {
            if ($entry['language']['name'] == 'en') {
                $this->descripcion = $entry['flavor_text'];
                exit;
            }
        }
    }

    // Getter and Setter for $art

    public function getArt(): string {
        return $this->art;
    }


    public function setArt(string $art): void {
        $this->art = $art;
    }

    // Getter and Setter for $sprite
    public function getSprite(): string {
        return $this->sprite;
    }

    public function setSprite(string $sprite): void {
        $this->sprite = $sprite;
    }

    // Getter and Setter for $tipos


    /**
     * Hay que entrar en el Types y luego buscar los nombres
     * para guardarlos en un array que simplemente tenga (ejemplo)
     * [bicho, tierra]
     * @param array response['types'] matriz
     */
    public function setTipos(array $types): void {
        $tipos = array_map(function ($typeEntry) {
            return $typeEntry['type']['name'];
        }, $types);
        $this->tipos = $tipos;
    }

    public function getTipos(): array {
        return $this->tipos;
    }

    // Getter and Setter for $grito
    public function getGrito(): string {
        return $this->grito;
    }

    public function setGrito(string $grito): void {
        $this->grito = $grito;
    }

    // Getter and Setter for $altura
    public function getAltura(): int {
        return $this->altura;
    }

    public function setAltura(int $altura): void {
        $this->altura = $altura;
    }

    // Getter and Setter for $peso
    public function getPeso(): int {
        return $this->peso;
    }

    public function setPeso(int $peso): void {
        $this->peso = $peso;
    }
}
