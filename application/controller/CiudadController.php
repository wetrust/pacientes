<?php

class CiudadController extends Controller
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
                $resultado = CiudadModel::getAllCiudades();
                break;
            case "new":
                $resultado = CiudadModel::createCiudad(Request::post('ciudad_name'));
                break;
            case "set":
                $resultado = CiudadModel::updateCiudad(Request::post('ciudad_id'), Request::post('ciudad_name'));
                break;
            case "read":
                $resultado = CiudadModel::getCiudad(Request::post('ciudad_id'));
                break;
        }
        return $this->View->renderJSON($resultado);
    }
}
