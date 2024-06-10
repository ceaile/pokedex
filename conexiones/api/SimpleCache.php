<?php

namespace conexiones\api;
class SimpleCache {
    private $cacheDir;

    /**
     * Constructor de la clase SimpleCache.
     * Crea el directorio de caché si no existe.
     * @param string $cacheDir El directorio donde se almacenará la caché.
     */
    public function __construct($cacheDir = 'cache') {
        $this->cacheDir = $cacheDir;

        if (!is_dir($cacheDir)) {
            mkdir($cacheDir, 0755, true); //permiso 755 (RWX para el propietario, y RX para el resto)
        }
    }

    /**
     * Obtiene los datos de la caché para una clave dada.
     * @param string $key La clave para la cual se obtendrán los datos.
     * @return mixed Los datos de la caché para la clave dada, o null si no existen datos para esa clave.
     */
    public function get($key) {
        $cacheFile = "{$this->cacheDir}/{$key}.json";
        if (file_exists($cacheFile)) {
            $data = file_get_contents($cacheFile);
            return json_decode($data, true);
        }
        return null;
    }

    /**
     * Establece los datos de la caché para una clave dada.
     * @param string $key La clave para la cual se establecerán los datos.
     * @param mixed $data Los datos que se almacenarán en la caché.
     * @param int $ttl El tiempo de vida de los datos en la caché, en segundos.
     */
    public function set($key, $data, $ttl = 3600) {
        $cacheFile = "{$this->cacheDir}/{$key}.json";
        $data = json_encode($data);
        file_put_contents($cacheFile, $data);
        touch($cacheFile, time() + $ttl);
    }
}
