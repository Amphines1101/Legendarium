<?php

namespace Legendarium\Controllers;

use Legendarium\Models\UserManager;


/** Class UserController **/
class UserController {
    private $manager;


    public function __construct() {
        $this->manager = new UserManager();

    }

    public function index()
    {
        require VIEWS . 'Article/homepage.php';
    }
    /** Affichage de la page d'authentification **/
    public function showLogin() {
        require VIEWS . 'Auth/login.php';
    }

    /** Affichage de la page register **/
    public function showRegister() {
        
        require VIEWS . 'Auth/register.php';
    }

    /** logout **/
    public function logout()
    {
        
        session_destroy();
        header('Location: /login/');
    }

    /** insertion d'un user **/
    public function register() {
 
        $_SESSION['old'] = $_POST;

            /** vérifie si le pseudo existe déjà **/
            $res = $this->manager->getUserByPseudo($_POST["username"]);

            if (empty($res)) {
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $this->manager->store($password);

                $_SESSION["user"] = [
                    "id" => $this->manager->getBdd()->lastInsertId(),
                    "pseudo" => $_POST["username"],
                ];
                header("Location: /");
            } else {
                $_SESSION["error"]['pseudo'] = "Le pseudo choisi est déjà utilisé !";
                header("Location: /register");
            }
    }

    /** vérification de l'autentification **/
    public function login() {

        $_SESSION['old'] = $_POST;

            $res = $this->manager->getUserByPseudo($_POST["username"]);

            if ($res && password_verify($_POST['password'], $res->getPassword())) {
                $_SESSION["user"] = [
                    "id" => $res->getId_user(),
                    "pseudo" => $res->getPseudo(),
                ];
                header("Location: /");
            } else {
                $_SESSION["error"]['message'] = "Une erreur sur les identifiants";
                header("Location: /login");
            }
    }
}
