<?php

//AutoIncluye las clases que incluyes con use, cargado en public/index.php
class Autoload
{
    public static function register()
    {
        spl_autoload_register(function ($class) {
            $file = str_replace('\\', DIRECTORY_SEPARATOR, $class).'.php';
            $filepath = __ROOT__.DIRECTORY_SEPARATOR.$file;
            //echo $filepath;
            if (file_exists($filepath)) {
                require $filepath;
                return true;
            }
            return false;
        });
    }
}

?>