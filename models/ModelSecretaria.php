<?php

include_once('views/SecretariaView.php');
include_once('models/ModelSecretaria.php');


class ModelSecretaria
{
    private $model;
    private $view;

    

 public function verify()
    {
        if (!empty($_POST['usernameLogin']) && !empty($_POST['passwordLogin'])) {
            $user = $_POST['usernameLogin'];
            $pass = $_POST['passwordLogin'];
            $userDb = $this->model->getUserByUsername($user);

            if (!empty($userDb) && password_verify($pass, $userDb->password)) {
                AuthHelper::login($userDb);
                $_SESSION["admin"] = $userDb->admin;
                header('Location: ' . BASE_URL . "index");
            } else
                $this->view->showLogin("Login incorrecto, password o usuario incorrecto");
        } else {
            $this->view->showLogin("Login incompleto");
        }
    }


    private function CheckLoggedIn(){
        
        if(!isset($_SESSION["admin"])){
            $logged = "false";
        } elseif ($_SESSION["admin"] == 1){
            $logged = "admin";
        } else {
            $logged = "user";
        }
        return $logged;
    }


    public function logout()
    {
        AuthHelper::logout();
        header("Location: " . BASE_URL . 'login');
    }

    public function showLogin()
    {
        $logged = $this->CheckLoggedIn();
        $this->view->showLogin($logged);
    }



}