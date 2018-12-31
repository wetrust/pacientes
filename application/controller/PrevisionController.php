<?php

class PrevisionController extends Controller
{
    /**
     * Construct this object by extending the basic Controller class
     */
    public function __construct()
    {
        parent::__construct();
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
                $resultado = PrevisionModel::getAllPrevisiones();
                break;
            case "new":
                $resultado = PrevisionModel::createPrevision(Request::post('prevision_name'));
                break;
            case "set":
                $resultado = PrevisionModel::updatePrevision(Request::post('prevision_id'), Request::post('prevision_name'));
                break;
            case "read":
                $resultado = PrevisionModel::getPrevision(Request::post('prevision_id'));
                break;
        }
        return $this->View->renderJSON($resultado);
    }
}
