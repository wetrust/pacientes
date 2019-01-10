<?php

class PacientesController extends Controller
{
    /**
     * Construct this object by extending the basic Controller class
     */
    public function __construct()
    {
        parent::__construct();
        Auth::checkAuthentication();
    }

    /**
     * Handles what happens when user moves to URL/index/index - or - as this is the default controller, also
     * when user moves to /index or enter your application at base level
     */
    public function api()
    {
        $accion = Request::post('action');
        $resultado = "";
        switch ($accion) {
            case "get":
                $resultado = PacienteModel::getAllPacientes();
                break;
            case "new":
                $resultado = PacienteModel::createPaciente(Request::post('paciente_rut'),Request::post('paciente_nombre'),Request::post('paciente_apellido'),Request::post('paciente_telefono'),Request::post('paciente_email'),Request::post('paciente_prevision'),Request::post('paciente_ciudad'),Request::post('paciente_lugar'),Request::post('paciente_profesional'),Request::post('paciente_acompanantes'));
                break;
            case "set":
                $resultado = PacienteModel::updatePaciente(Request::post('ciudad_id'), Request::post('ciudad_name'));
                break;
            case "read":
                $resultado = PacienteModel::getPaciente(Request::post('paciente_rut'));
                break;
            case "delete":
                $resultado = PacienteModel::deletePaciente(Request::post('paciente_rut'));
                break;
        }
        return $this->View->renderJSON($resultado);
    }
}
