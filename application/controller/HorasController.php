<?php

class HorasController extends Controller
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
                $resultado = HoraModel::getAllHoras(Request::post('hora_fecha'));
                break;
            case "new":
                $resultado = HoraModel::createHora(Request::post('hora_rut'), Request::post('hora_fecha'), Request::post('hora_atencion'), Request::post('hora_tipo'), Request::post('hora_hora'),Request::post('hora_cancelacion'),Request::post('hora_cancelado'),Request::post('hora_adicional'), Request::post('hora_situacion'), Request::post('hora_ecografista'));
                break;
            case "set":
                $resultado = HoraModel::updateHora(Request::post('hora_id'), Request::post('hora_fecha'), Request::post('hora_atencion'), Request::post('hora_tipo'), Request::post('hora_hora'),Request::post('hora_cancelacion'),Request::post('hora_cancelado'),Request::post('hora_adicional'), Request::post('hora_situacion'), Request::post('hora_ecografista'));
                break;
            case "read":
                $resultado = HoraModel::getHora(Request::post('hora_id'));
                break;
            case "delete":
                $resultado = HoraModel::deletePHora(Request::post('hora_id'));
                break;
        }
        return $this->View->renderJSON($resultado);
    }
}
