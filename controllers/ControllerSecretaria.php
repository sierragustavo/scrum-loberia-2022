<?php

include_once('./views/SecretariaView.php');
include_once('./models/ModelSecretaria.php');

class ControllerSecretaria extends Controller
{
    private $modelTurnos;

    public function __construct()
    {
        $this->modelTurnos = new ModelTurno();
        $this->view = new SecretariaView();
        $this->authhelper = new AuthHelper();
        $this->model = new ModelSecretaria();
    }


    public function showLoginSecretaria()
    {
        $this->view->showLoginSecretaria();
    }

    public function logearSecretaria()
    {
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $checkUsername = $this->model->comprobarUsername($_POST['username'], $_POST['password']);
            if ($checkUsername == 1) {
                $username = $_POST['username'];
                AuthHelper::loginSecretaria($username);
                header("Location:" . BASE_URL . 'portalsecretaria');
            } else {
                header("Location:" . BASE_URL . 'loginpersonal');
            }
        } else
            header("Location:" . BASE_URL . 'loginpersonal');
    }

    public function showPortalSecretaria()
    {
        $this->view->showPortalSecretaria();
    }

    //funcion para cargarle un turno a un medico y confirmarselo al paciente
    public function cargarTurno($id_turno, $id_medico)
    {
        $this->modelTurnos->cargarTurnoMedico($id_turno, $id_medico);
        $this->modelTurnos->confirmarTurnoPaciente($id_turno);
        header("Location:" . BASE_URL . 'turnosolicitados');
        
    }
    
    //funcion para mostrar los turnos solicitados de lxs medicxs segun el id_secretaria
    public function showCargarTurno()
    {
        $username = AuthHelper::getLoggedUserName();
        $id = $this->model->getId($username);
        $id = intval($id->id_secretaria);
        $turnos = $this->modelTurnos->getTurnosSecretaria($id);
      
        $this->view->showCargarTurno($turnos);
    }

    public function showAdministrarTurnos(){
        $this->view->showAdministrarTurnos();
    }
  
}
