<?php
namespace controladores;

use modelos\Usuario;
use modelos\Sesion;
use controladores\PadreController;
use Exception;


class SignupController extends PadreController{
    public function mostrarSignup() {
        //if($_SERVER['REQUEST_METHOD'] !== 'GET') exit; //set 404
        $this->renderView('signup.php', [
            'title' => "Regístrate en Pokédex",
        ]);
    }





    public function signup() {
        try{

            $username = $_POST['username'];
            $password1 = $_POST['password1'];
            $password2 = $_POST['password2'];

            if ($password1==$password2) {
                $u = new Usuario($this->pdo);
             
                //if (!$s->sessionStarted()) $s->crear();
            
                if ($u->insertarUser($username, $password1)) {
                    $this->renderView('home.html', [ //esta ruta cambiará seguramente
                        'sesion' => $this->s->obtenerSesion('username'),
                    ]);

                } else {
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
