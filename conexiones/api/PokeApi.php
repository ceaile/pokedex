<?php
namespace conexiones\api;

use Exception;

//para guzzle:
require __DIR__ . '/../../vendor/autoload.php';
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use GuzzleHttp\Exception\RequestException;
use modelos\SimpleCache;


class PokeApi {
    //uso con guzzle:
    private $client;
    private string $URLBase = 'https://pokeapi.co/api/v2/pokemon/';
    private string $URLBaseSpecies = 'https://pokeapi.co/api/v2/pokemon-species/'; //para la descripcion!
    public ?array $response = null;
    public ?string $error = null;
    private $cache;

    public function __construct() {
        $this->client = new Client();
        $this->cache = new SimpleCache(); // Instanciar la caché
    }
    /**
     * Llamada para casi todos los datos necesarios de la pokeapi
     */
    public function construirLlamada(int $pokemonId) {
        if ($pokemonId <= 0)
            throw new Exception("El id del pokemon no es válido: " . $pokemonId);
        return $this->client->getAsync($this->URLBase . $pokemonId);
    }

    /**
     * Llamada exclusiva para conseguir la descripcion del pokemon
     */
    public function construirLlamadaEspecies(int $pokemonId) {
        if ($pokemonId <= 0)
            throw new Exception("El id del pokemon no es válido: " . $pokemonId);
        return $this->client->getAsync($this->URLBaseSpecies . $pokemonId);
    }

    public function getPokemonData(int $pokemonId) {
        $cacheKey = "pokemon_{$pokemonId}";

        // Intentar obtener los datos de la caché
        $cachedData = $this->cache->get($cacheKey);
        if ($cachedData) {
            return $cachedData;
        }

        try {
            $response = $this->construirLlamada($pokemonId)->wait();
            $data = json_decode($response->getBody(), true);

            $responseSpecies = $this->construirLlamadaEspecies($pokemonId)->wait();
            $dataSpecies = json_decode($responseSpecies->getBody(), true);

            // Combinar los datos
            $data = array_merge($data, $dataSpecies);

            // Guardar los datos en la caché
            $this->cache->set($cacheKey, $data, 3600); // TTL de 1 hora

        

            return $data;
        } catch (RequestException $e) {
            $this->error = $e->getMessage();
            return null;
        }
    }

}
