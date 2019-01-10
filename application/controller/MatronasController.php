<?php

class MatronasController extends Controller
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
                $resultado = MatronaModel::getAllMatronas();
                break;
            case "new":
                $resultado = MatronaModel::createMatrona(Request::post('matrona_name'));
                break;
            case "set":
                $resultado = MatronaModel::updateMatrona(Request::post('matrona_id'), Request::post('matrona_name'));
                break;
            case "read":
                $resultado = MatronaModel::getMatrona(Request::post('matrona_id'));
                break;
        }
        return $this->View->renderJSON($resultado);
    }
}
