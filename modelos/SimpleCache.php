<?php 
namespace modelos;

use conexiones\bbdd\Bbdd;
use conexiones\api\PokeApi;
use PDO;
use Exception;

class SimpleCache {
    private $cacheDir;

    public function __construct($cacheDir = 'cache') {
        $this->cacheDir = $cacheDir;

        if (!is_dir($cacheDir)) {
            mkdir($cacheDir, 0755, true);
        }
    }

    public function get($key) {
        $cacheFile = "{$this->cacheDir}/{$key}.json";
        if (file_exists($cacheFile)) {
            $data = file_get_contents($cacheFile);
            return json_decode($data, true);
        }
        return null;
    }

    public function set($key, $data, $ttl = 3600) {
        $cacheFile = "{$this->cacheDir}/{$key}.json";
        $data = json_encode($data);
        file_put_contents($cacheFile, $data);
        touch($cacheFile, time() + $ttl);
    }
}
