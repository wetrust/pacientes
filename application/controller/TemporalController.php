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
        header("Access-Control-Allow-Origin: *");
        $resultado = "";
        switch ($accion) {
            case "get":
                $resultado = TemporalModel::getAllTemporales();
                break;
            case "new":
                $resultado = TemporalModel::createTemporal(Request::post('temporal_id'), Request::post('temporal_name'), Request::post('temporal_motivo'), Request::post('temporal_patologia'), Request::post('temporal_profesional'), Request::post('temporal_edad'),Request::post('temporal_fur'),Request::post('temporal_semanas'),Request::post('temporal_dias'),Request::post('temporal_fpp'));
                break;
            case "set":
                $resultado = TemporalModel::updateTemporal(Request::post('temporal_id'), Request::post('temporal_name'), Request::post('temporal_motivo'), Request::post('temporal_patologia'), Request::post('temporal_profesional'), Request::post('temporal_edad'),Request::post('temporal_fur'),Request::post('temporal_semanas'),Request::post('temporal_dias'),Request::post('temporal_fpp'));
                break;
            case "read":
                $resultado = TemporalModel::getTemporal(Request::post('temporal_id'));
                break;
            case "del":
                $resultado = TemporalModel::deleteTemporal(Request::post('temporal_id'));
                break;
        }
        return $this->View->renderJSON($resultado);
    }

    public function primer()
    {
        $accion = Request::post('action');
        header("Access-Control-Allow-Origin: *");
        $resultado = "";
        switch ($accion) {
            case "get":
                $resultado = TemporalModel::getAllUno(Request::post('temporal_id'));
                break;
            case "getOne":
                $resultado = TemporalModel::getUno(Request::post('temporal_id'),Request::post('temptable_id'));
                break;
            case "new":
                $resultado = TemporalModel::createUno(Request::post('temporal_id'), Request::post('temptable_eg'), Request::post('temptable_lcn'), Request::post('temptable_saco'),Request::post('temporal_fecha'));
                break;
            case "set":
                $resultado = TemporalModel::updateUno(Request::post('temporal_id'), Request::post('temptable_id'), Request::post('temptable_eg'), Request::post('temptable_lcn'), Request::post('temptable_saco'),Request::post('temporal_fecha'));
                break;
            case "read":
                $resultado = TemporalModel::getTemporal(Request::post('temporal_id'));
                break;
            case "del":
                $resultado = TemporalModel::deleteUno(Request::post('temptable_id'));
                break;
        }
        return $this->View->renderJSON($resultado);
    }

    public function segundo()
    {
        $accion = Request::post('action');
        header("Access-Control-Allow-Origin: *");
        $resultado = "";
        switch ($accion) {
            case "get":
                $resultado = TemporalModel::getAllDos(Request::post('temporal_id'));
                break;
            case "getOne":
                $resultado = TemporalModel::getDos(Request::post('temporal_id'),Request::post('tempdostable_correlativo'));
                break;
            case "new":
                $resultado = TemporalModel::createDos(Request::post('tempdostable_id'), Request::post('tempdostable_eg'), Request::post('tempdostable_dbp'), Request::post('tempdostable_dof'), Request::post('tempdostable_cc'), Request::post('tempdostable_ca'), Request::post('tempdostable_lf'), Request::post('tempdostable_bvm'), Request::post('tempdostable_lh'), Request::post('tempdostable_cerebelo'), Request::post('tempdostable_pfe'), Request::post('tempdostable_egP50'), Request::post('tempdostable_presentacion'), Request::post('tempdostable_dorso'), Request::post('tempdostable_fcf'), Request::post('tempdostable_sexo'), Request::post('tempdostable_morfo'), Request::post('tempdostable_anatomia'), Request::post('tempdostable_ubicacion'), Request::post('tempdostable_incersion'), Request::post('tempdostable_grado'), Request::post('tempdostable_liq'), Request::post('tempdostable_cordon'), Request::post('tempdostable_vasos'), Request::post('tempdostable_comentario'), Request::post('tempdostable_comentarios'),Request::post('temporal_fecha'));
                break;
            case "set":
                $resultado = TemporalModel::updateDos(Request::post('tempdostable_id'), Request::post('tempdostable_correlativo'),Request::post('tempdostable_eg'), Request::post('tempdostable_dbp'), Request::post('tempdostable_dof'), Request::post('tempdostable_cc'), Request::post('tempdostable_ca'), Request::post('tempdostable_lf'), Request::post('tempdostable_bvm'), Request::post('tempdostable_lh'), Request::post('tempdostable_cerebelo'), Request::post('tempdostable_pfe'), Request::post('tempdostable_egP50'), Request::post('tempdostable_presentacion'), Request::post('tempdostable_dorso'), Request::post('tempdostable_fcf'), Request::post('tempdostable_sexo'), Request::post('tempdostable_morfo'), Request::post('tempdostable_anatomia'), Request::post('tempdostable_ubicacion'), Request::post('tempdostable_incersion'), Request::post('tempdostable_grado'), Request::post('tempdostable_liq'), Request::post('tempdostable_cordon'), Request::post('tempdostable_vasos'), Request::post('tempdostable_comentario'), Request::post('tempdostable_comentarios'),Request::post('temporal_fecha'));
                break;
            case "read":
                $resultado = TemporalModel::getTemporal(Request::post('temporal_id'));
                break;
            case "del":
                $resultado = TemporalModel::deleteDos(Request::post('tempdostable_id'));
                break;
        }
        return $this->View->renderJSON($resultado);
    }

    public function tercero()
    {
        $accion = Request::post('action');
        header("Access-Control-Allow-Origin: *");
        $resultado = "";
        switch ($accion) {
            case "get":
                $resultado = TemporalModel::getAllTres(Request::post('temporal_id'));
                break;
            case "getOne":
                $resultado = TemporalModel::getTres(Request::post('temporal_id'),Request::post('temptrestable_correlativo'));
                break;
            case "new":
                $resultado = TemporalModel::createTres(Request::post('temptrestable_id'),Request::post('temptrestable_eg'),Request::post('temptrestable_utd'),Request::post('temptrestable_uti'), Request::post('temptrestable_put'), Request::post('temptrestable_au'), Request::post('temptrestable_cm'),Request::post('temptrestable_cp'),Request::post('temptrestable_dv'),Request::post('temptrestable_acm'),Request::post('temporal_fecha'));
                break;
            case "set":
                $resultado = TemporalModel::updateTres(Request::post('temptrestable_id'),Request::post('temptrestable_correlativo'),Request::post('temptrestable_eg'),Request::post('temptrestable_utd'),Request::post('temptrestable_uti'), Request::post('temptrestable_put'), Request::post('temptrestable_au'), Request::post('temptrestable_cm'),Request::post('temptrestable_cp'),Request::post('temptrestable_dv'),Request::post('temptrestable_acm'),Request::post('temporal_fecha'));
                break;
            case "read":
                $resultado = TemporalModel::getTemporal(Request::post('temporal_id'));
                break;
            case "del":
                $resultado = TemporalModel::deleteTres(Request::post('temptrestable_id'));
                break;
        }
        return $this->View->renderJSON($resultado);
    }
}
