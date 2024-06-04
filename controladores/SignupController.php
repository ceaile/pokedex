<?php
namespace controladores;

use modelos\Usuario;
use modelos\Sesion;
use controladores\PadreController;
use Exception;


class SignupController extends PadreController{

    public function mostrarSignup() {
        if ($this->userLogeado) header("Location: home");
        //if($_SERVER['REQUEST_METHOD'] !== 'GET') exit; //set 404
        $this->renderView('signup.php', [
            'title' => "Register into Pokédex",
        ]);
    }


    public function signup() {
        try{
            $username = $_POST['username'];
            $password1 = $_POST['password1'];
            $password2 = $_POST['password2'];
            if ($password1==$password2) {
                $u = new Usuario($this->pdo, $this->pokeapi);
                //if ($u->insertarUser($username, $password1)) {
                    if ($u->insertarUserCompleto($username, $password1)) {
                    $this->renderView('login.php', [ //esta ruta cambiará seguramente
                    ]);
                } else { //necesita un aviso de si el user ya existe
                    $this->renderView('signup.php');
                }
            } else{
                throw new Exception('Passwords are not the same.');
            }
        } catch(Exception $e){
            echo $e->getMessage();
        }    
    }



}
