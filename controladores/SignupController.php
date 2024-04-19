<?php
namespace Controladores;
use modelos\Usuario; 
use controladores\PadreController;

class SignupController extends PadreController{
    public function mostrarSignup() {
        //if($_SERVER['REQUEST_METHOD'] !== 'GET') exit; //set 404
        $this->renderView('signup.php', [
            'title' => "Regístrate en Pokédex",
        ]);
    }





    public function signup() {
        //hacer cosas
    }


}
