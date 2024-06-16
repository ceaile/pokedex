<?php

namespace controladores;

use modelos\Usuario;
use modelos\Sesion;
use controladores\PadreController;
use Exception;


class SignupController extends PadreController {

    public function mostrarSignup() {
        if ($this->userLogeado) header("Location: home");
        //unset($_SESSION['mensaje_signup']);
        $this->renderView('signup.php', [
            'title' => "Register into Pokédex",

        ]);
    }


    public function signup() {
        //unset($_SESSION['mensaje_signup']);
        try {
            $username = $_POST['username'];
            $password1 = $_POST['password1'];
            $password2 = $_POST['password2'];
            if ($password1 == $password2) {
                $u = new Usuario($this->pdo, $this->pokeapi);
                if ($u->insertarUserCompleto($username, $password1)) {
                    $this->s->poner('mensaje_bienvenida', "We're excited to have you");
                    header("Location: login");
                } else { //aviso de si el user ya existe
                    $this->s->poner('mensaje_signup', "Sorry! The username already exists or you wrote your password differently.");
                    header("Location: signup");
                }
            } else {
                $this->s->poner('mensaje_signup', "Sorry! The username already exists or you wrote your password differently.");
                header("Location: signup");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
