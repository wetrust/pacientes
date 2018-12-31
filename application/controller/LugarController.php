<?php

class LugarController extends Controller
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
                $resultado = LugarModel::getAllLugares();
                break;
            case "new":
                $resultado = LugarModel::createLugar(Request::post('lugar_name'));
                break;
            case "set":
                $resultado = LugarModel::updateLugar(Request::post('lugar_id'), Request::post('lugar_name'));
                break;
            case "read":
                $resultado = LugarModel::getLugar(Request::post('lugar_id'));
                break;
        }
        return $this->View->renderJSON($resultado);
    }
}
