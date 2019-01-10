<?php

class EcografistaController extends Controller
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
                $resultado = EcografistaModel::getAllEcografistas();
                break;
            case "new":
                $resultado = EcografistaModel::createEcografista(Request::post('ecografista_name'));
                break;
            case "set":
                $resultado = EcografistaModel::updateEcografista(Request::post('ecografista_id'), Request::post('ecografista_name'));
                break;
            case "read":
                $resultado = EcografistaModel::getEcografista(Request::post('ecografista_id'));
                break;
            case "delete":
                $resultado = EcografistaModel::deletePaciente(Request::post('ecografista_id'));
                break;
        }
        return $this->View->renderJSON($resultado);
    }
}
