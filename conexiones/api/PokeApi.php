<?php
namespace conexiones\api;
use Exception;
//para guzzle:
require __DIR__ . '/../../vendor/autoload.php';
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use GuzzleHttp\Exception\RequestException;

//para uso de curl:
//Documentacion pokeapi v2: https://pokeapi.co/docs/v2#pokemon
/* Prueba en navegador
fetch('https://pokeapi.co/api/v2/pokemon/ditto')
 .then(response => response.json())
 .then(data => console.log(data))
 .catch(error => console.error('Error:', error));
*/

class PokeApi {
    /*//para uso de curl:
    private $curl = null;
    private string $URLBase = 'https://pokeapi.co/api/v2/pokemon/';
    public ?array $response = null; // Propiedad pública para almacenar la respuesta
    public ?string $error = null;   // Propiedad pública para almacenar el error

    public function construirLlamada(int $pokemonId) : void {
        if ($pokemonId <= 0) throw new Exception("El id del pokemon no es válido: ".$pokemonId);
        $this->curl = curl_init();
        curl_setopt_array($this->curl, array(
            CURLOPT_URL => $this->URLBase. $pokemonId,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1, // Corregido aquí
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "",
        ));
    }
    public function llamarApi() {
        $responseRaw = curl_exec($this->curl);
        $this->error = curl_error($this->curl);
        //var_dump($this->error, $responseRaw);die;
        // Cierra la sesión cURL
        curl_close($this->curl);
        if ($this->error) {
            $this->error = "Hubo un error al llamar a la API: {$this->error}";
        } else {
            $this->response = json_decode($responseRaw, true);
        }
    }
*/

//uso con guzzle:
private $client;
private string $URLBase = 'https://pokeapi.co/api/v2/pokemon/';
public ?array $response = null;
public ?string $error = null;

public function __construct() {
    $this->client = new Client();
}

public function construirLlamada(int $pokemonId) {
    if ($pokemonId <= 0) throw new Exception("El id del pokemon no es válido: ".$pokemonId);
    return $this->client->getAsync($this->URLBase. $pokemonId);
}




}
