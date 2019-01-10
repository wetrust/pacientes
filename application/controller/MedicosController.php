<?php

class MedicosController extends Controller
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
                $resultado = MedicoModel::getAllMedicos();
                break;
            case "new":
                $resultado = MedicoModel::createMedico(Request::post('medico_name'));
                break;
            case "set":
                $resultado = MedicoModel::updateMedico(Request::post('medico_id'), Request::post('medico_name'));
                break;
            case "read":
                $resultado = MedicoModel::getMedico(Request::post('medico_id'));
                break;
        }
        return $this->View->renderJSON($resultado);
    }
}
