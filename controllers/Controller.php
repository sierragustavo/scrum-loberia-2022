<?php
require_once('views/PacienteView.php');
require_once('views/SecretariaView.php');
require_once('views/TurnosView.php');
require_once('models/ModelMedico.php');
require_once('models/ModelSecretaria.php');
require_once('models/ModelPaciente.php');
require_once('models/ModelTurnos.php');

class Controller
{

    private $viewPaciente;
    private $viewSecretaria;
    private $viewTurnos;
    private $modelMedico;
    private $modelSecretaria;
    private $modelPaciente;
    private $modelTurnos;
    

    //En el constructor hago las conecciones a la bases de datos y
    //a la vista para poder usarlas dentro de esta clase.
    public function __construct()
    {
        $this->viewPaciente = new PacienteView();
        $this->viewSecretaria = new SecretariaView();
        $this->viewTurnos= new TurnosView();
        $this->modelMedico = new ModelMedico();
        $this->modelSecretaria = new ModelSecretaria();
        $this->modelPaciente = new ModelPaciente();
        $this->modelTurnos = new ModelTurnos();

    }

    function getViewPaciente()
    {
        return $this->viewPaciente;
    }

    function getViewSecretaria()
    {
        return $this->viewSecretaria;
    }

    function getViewTurnos()
    {
        return $this->viewTurnos;
    }

    function getModelMedico()
    {
        return $this->modelMedico;
    }

    function getModelSecretaria()
    {
        return $this->modelSecretaria;
    }

    function getModelPaciente()
    {
        return $this->modelPaciente;
    }

    function getModelTurnos()
    {
        return $this->modelTurnos;
    }
}
