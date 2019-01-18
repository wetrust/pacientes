<?php

class TemporalController extends Controller
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
                $resultado = TemporalModel::getAllLugares();
                break;
            case "new":
                $resultado = TemporalModel::createTemporal(Request::post('temporal_id'), Request::post('temporal_name'), Request::post('temporal_motivo'), Request::post('temporal_patologia'), Request::post('temporal_profesional'), Request::post('temporal_edad'));
                break;
            case "set":
                $resultado = TemporalModel::updateTemporal(Request::post('temporal_id'), Request::post('temporal_name'), Request::post('temporal_motivo'), Request::post('temporal_patologia'), Request::post('temporal_profesional'), Request::post('temporal_edad'));
                break;
            case "read":
                $resultado = TemporalModel::getTemporal(Request::post('temporal_id'));
                break;
        }
        return $this->View->renderJSON($resultado);
    }
}
