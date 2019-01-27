<?php

/**
 * TemporalModel
 * This is basically a simple CRUD (Create/Read/Update/Delete) demonstration.
 */
class TemporalModel
{
    /**
     * Get all temporales (temporales are just example data that the user has created)
     * @return array an array with several objects (the results)
     */
    public static function getAllTemporales()
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT temporal_id, temporal_name, temporal_motivo, temporal_patologia, temporal_profesional, temporal_edad, temporal_fur,temporal_semanas,temporal_dias,temporal_fpp FROM temporales";
        $query = $database->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetchAll();
    }

    public static function getAllUno($temporal_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT * FROM temptable WHERE temptable_rut = :temptable_rut";
        $query = $database->prepare($sql);
        $query->execute(array(':temptable_rut' => $temporal_id));

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetchAll();
    }

    public static function getUno($temporal_id,$temptable_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT temptable_rut, temptable_saco, temptable_lcn, temptable_eg, temptable_fecha FROM temptable WHERE temptable_rut = :temptable_rut and temptable_id = :temptable_id";
        $query = $database->prepare($sql);
        $query->execute(array(':temptable_rut' => $temporal_id, 'temptable_id' => $temptable_id));

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetch();
    }

    public static function getAllDos($temporal_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT * FROM tempdostable WHERE tempdostable_id = :tempdostable_id";
        $query = $database->prepare($sql);
        $query->execute(array(':tempdostable_id' => $temporal_id));

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetchAll();
    }

    public static function getDos($temporal_id, $tempdostable_correlativo)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT * FROM tempdostable WHERE tempdostable_id = :tempdostable_id AND tempdostable_correlativo = :tempdostable_correlativo";
        $query = $database->prepare($sql);
        $query->execute(array(':tempdostable_id' => $temporal_id, ':tempdostable_correlativo' => $tempdostable_correlativo));

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetch();
    }


    public static function getAllTres($temporal_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT * FROM temptrestable WHERE temptrestable_id = :temptrestable_id";
        $query = $database->prepare($sql);
        $query->execute(array(':temptrestable_id' => $temporal_id));

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetchAll();
    }

    public static function getTres($temporal_id, $temptrestable_correlativo)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT * FROM temptrestable WHERE temptrestable_id = :temptrestable_id AND temptrestable_correlativo = :temptrestable_correlativo";
        $query = $database->prepare($sql);
        $query->execute(array(':temptrestable_id' => $temporal_id, ':temptrestable_correlativo' => $temptrestable_correlativo));

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetch();
    }
    /**
     * Get a single temporal
     * @param int $temporal_id id of the specific temporal
     * @return object a single object (the result)
     */
    public static function getTemporal($temporal_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT temporal_id, temporal_name, temporal_motivo, temporal_patologia, temporal_profesional, temporal_edad, temporal_fur,temporal_semanas,temporal_dias,temporal_fpp FROM temporales WHERE temporal_id = :temporal_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':temporal_id' => $temporal_id));

        // fetch() is the PDO method that gets a single result
        return $query->fetch();
    }

    public static function checkTemporal($temporal_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT temporal_id, temporal_name, temporal_motivo, temporal_patologia, temporal_profesional, temporal_edad, temporal_fur, temporal_semanas, temporal_dias, temporal_fpp FROM temporales WHERE temporal_id = :temporal_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':temporal_id' => $temporal_id));

        // fetch() is the PDO method that gets a single result
        if ($query->rowCount() == 1) {
            return true;
        }

        return false;
    }

    /**
     * Set a temporal (create a new one)
     * @param string $temporal_text temporal text that will be created
     * @return bool feedback (was the temporal created properly ?)
     */
    public static function createTemporal($temporal_id, $temporal_name, $temporal_motivo, $temporal_patologia, $temporal_profesional, $temporal_edad, $temporal_fur, $temporal_semanas, $temporal_dias, $temporal_fpp)
    {
        if (!$temporal_id || strlen($temporal_id) == 0) {
            Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_CREATION_FAILED'));
            return false;
        }

        $temporal = self::checkTemporal($temporal_id);

        if ($temporal){
            return self::updateTemporal($temporal_id, $temporal_name, $temporal_motivo, $temporal_patologia, $temporal_profesional, $temporal_edad, $temporal_fur, $temporal_semanas, $temporal_dias, $temporal_fpp);
        }
        else{
        
            $database = DatabaseFactory::getFactory()->getConnection();

            $sql = "INSERT INTO temporales (temporal_id, temporal_name, temporal_motivo, temporal_patologia, temporal_profesional, temporal_edad, temporal_fur, temporal_semanas, temporal_dias, temporal_fpp) VALUES (:temporal_id, :temporal_name, :temporal_motivo, :temporal_patologia, :temporal_profesional, :temporal_edad, :temporal_fur, :temporal_semanas, :temporal_dias, :temporal_fpp)";
            $query = $database->prepare($sql);
            $query->execute(array(':temporal_id' => $temporal_id, ':temporal_name' => $temporal_name, ':temporal_motivo' => $temporal_motivo, ':temporal_patologia' => $temporal_patologia, ':temporal_profesional' => $temporal_profesional, ':temporal_edad' => $temporal_edad, ':temporal_fur' => $temporal_fur, ':temporal_semanas' => $temporal_semanas, ':temporal_dias' => $temporal_dias, ':temporal_fpp' => $temporal_fpp));

            if ($query->rowCount() == 1) {
                return true;
            }

            // default return
            Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_CREATION_FAILED'));
            return false;
        }
    }

    public static function createUno($temporal_id, $temptable_eg, $temptable_lcn, $temptable_saco, $temptable_fecha,$temptable_citaprimtrim, $temptable_consentimiento)
    {
        if (!$temporal_id || strlen($temporal_id) == 0) {
            Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_CREATION_FAILED'));
            return false;
        }

            $database = DatabaseFactory::getFactory()->getConnection();

            $sql = "INSERT INTO temptable (temptable_rut, temptable_eg, temptable_lcn, temptable_saco, temptable_fecha, temptable_citaprimtrim,temptable_consentimiento) VALUES (:temptable_rut, :temptable_eg, :temptable_lcn, :temptable_saco, :temptable_fecha, :temptable_citaprimtrim, :temptable_consentimiento)";
            $query = $database->prepare($sql);
            $query->execute(array(':temptable_rut' => $temporal_id, ':temptable_eg' => $temptable_eg, ':temptable_lcn' => $temptable_lcn, ':temptable_saco' => $temptable_saco, ':temptable_fecha' => $temptable_fecha, ':temptable_citaprimtrim' => $temptable_citaprimtrim, ':temptable_consentimiento' => $temptable_consentimiento));

            if ($query->rowCount() == 1) {
                return true;
            }

            // default return
            Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_CREATION_FAILED'));
            return false;
    }

    public static function createDos($tempdostable_id, $tempdostable_eg, $tempdostable_dbp, $tempdostable_dof, $tempdostable_cc, $tempdostable_ca, $tempdostable_lf, $tempdostable_bvm, $tempdostable_lh, $tempdostable_cerebelo, $tempdostable_pfe, $tempdostable_egP50, $tempdostable_presentacion, $tempdostable_dorso, $tempdostable_fcf, $tempdostable_sexo, $tempdostable_morfo, $tempdostable_anatomia, $tempdostable_ubicacion, $tempdostable_incersion, $tempdostable_grado, $tempdostable_liq, $tempdostable_cordon, $tempdostable_vasos, $tempdostable_comentario, $tempdostable_comentarios, $tempdostable_fecha,$tempdostable_pctpfe,$tempdostable_pctca, $tempdostable_citasegtrim, $tempdostable_consentimiento)
    {
        if (!$tempdostable_id || strlen($tempdostable_id) == 0) {
            Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_CREATION_FAILED'));
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "INSERT INTO tempdostable (tempdostable_id, tempdostable_eg, tempdostable_dbp, tempdostable_dof, tempdostable_cc, tempdostable_ca, tempdostable_lf, tempdostable_bvm, tempdostable_lh, tempdostable_cerebelo, tempdostable_pfe, tempdostable_egP50, tempdostable_presentacion, tempdostable_dorso, tempdostable_fcf, tempdostable_sexo, tempdostable_morfo, tempdostable_anatomia, tempdostable_ubicacion, tempdostable_incersion, tempdostable_grado, tempdostable_liq, tempdostable_cordon, tempdostable_vasos, tempdostable_comentario, tempdostable_comentarios, tempdostable_fecha,tempdostable_pctpfe,tempdostable_pctca, tempdostable_citasegtrim, tempdostable_consentimiento) VALUES (:tempdostable_id, :tempdostable_eg, :tempdostable_dbp, :tempdostable_dof, :tempdostable_cc, :tempdostable_ca, :tempdostable_lf, :tempdostable_bvm, :tempdostable_lh, :tempdostable_cerebelo, :tempdostable_pfe, :tempdostable_egP50, :tempdostable_presentacion, :tempdostable_dorso, :tempdostable_fcf, :tempdostable_sexo, :tempdostable_morfo, :tempdostable_anatomia, :tempdostable_ubicacion, :tempdostable_incersion, :tempdostable_grado, :tempdostable_liq, :tempdostable_cordon, :tempdostable_vasos, :tempdostable_comentario, :tempdostable_comentarios, :tempdostable_fecha,:tempdostable_pctpfe,:tempdostable_pctca, :tempdostable_citasegtrim, :tempdostable_consentimiento)";
        $query = $database->prepare($sql);
        $query->execute(array(':tempdostable_id' => $tempdostable_id, ':tempdostable_eg' => $tempdostable_eg, ':tempdostable_dbp' => $tempdostable_dbp, ':tempdostable_dof' => $tempdostable_dof, ':tempdostable_cc' => $tempdostable_cc, ':tempdostable_ca' => $tempdostable_ca, ':tempdostable_lf' => $tempdostable_lf, ':tempdostable_bvm' => $tempdostable_bvm, ':tempdostable_lh' => $tempdostable_lh, ':tempdostable_cerebelo' => $tempdostable_cerebelo, ':tempdostable_pfe' => $tempdostable_pfe, ':tempdostable_egP50' => $tempdostable_egP50, ':tempdostable_presentacion' => $tempdostable_presentacion, ':tempdostable_dorso' => $tempdostable_dorso, ':tempdostable_fcf' => $tempdostable_fcf, ':tempdostable_sexo' => $tempdostable_sexo, ':tempdostable_morfo' => $tempdostable_morfo, ':tempdostable_anatomia' => $tempdostable_anatomia, ':tempdostable_ubicacion' => $tempdostable_ubicacion, ':tempdostable_incersion' => $tempdostable_incersion, ':tempdostable_grado' => $tempdostable_grado, ':tempdostable_liq' => $tempdostable_liq, ':tempdostable_cordon' => $tempdostable_cordon, ':tempdostable_vasos' => $tempdostable_vasos, ':tempdostable_comentario'=> $tempdostable_comentario, ':tempdostable_comentarios' => $tempdostable_comentarios, ':tempdostable_fecha' => $tempdostable_fecha, ':tempdostable_pctpfe' => $tempdostable_pctpfe, ':tempdostable_pctca' => $tempdostable_pctca, ':tempdostable_citasegtrim' => $tempdostable_citasegtrim, ':tempdostable_consentimiento' => $tempdostable_consentimiento));
        if ($query->rowCount() == 1) {
            return true;
        }

        // default return
        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_CREATION_FAILED'));
        return false;
    }

    public static function createTres($temptrestable_id,$temptrestable_eg,$temptrestable_utd,$temptrestable_uti, $temptrestable_put, $temptrestable_au, $temptrestable_cm,$temptrestable_cp,$temptrestable_dv,$temptrestable_acm, $temptrestable_fecha, $temptrestable_citadoppler, $temptrestable_consentimiento)
    {
        if (!$temptrestable_id || strlen($temptrestable_id) == 0) {
            Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_CREATION_FAILED'));
            return false;
        }

            $database = DatabaseFactory::getFactory()->getConnection();

            $sql = "INSERT INTO temptrestable (temptrestable_id,temptrestable_eg,temptrestable_utd,temptrestable_uti,temptrestable_put, temptrestable_au, temptrestable_cm,temptrestable_cp,temptrestable_dv,temptrestable_acm, temptrestable_fecha, temptrestable_citadoppler, temptrestable_consentimiento) VALUES (:temptrestable_id,:temptrestable_eg,:temptrestable_utd,:temptrestable_uti, :temptrestable_put, :temptrestable_au, :temptrestable_cm,:temptrestable_cp,:temptrestable_dv,:temptrestable_acm, :temptrestable_fecha, :temptrestable_citadoppler, :temptrestable_consentimiento)";
            $query = $database->prepare($sql);
            $query->execute(array(':temptrestable_id'=> $temptrestable_id,':temptrestable_eg'=> $temptrestable_eg,':temptrestable_utd'=> $temptrestable_utd,':temptrestable_uti'=> $temptrestable_uti,':temptrestable_put'=> $temptrestable_put, ':temptrestable_au'=> $temptrestable_au, ':temptrestable_cm'=> $temptrestable_cm,':temptrestable_cp'=> $temptrestable_cp,':temptrestable_dv'=> $temptrestable_dv,':temptrestable_acm' => $temptrestable_acm,':temptrestable_fecha' => $temptrestable_fecha, ':temptrestable_citadoppler' => $temptrestable_citadoppler, ':temptrestable_consentimiento' => $temptrestable_consentimiento));

            if ($query->rowCount() == 1) {
                return true;
            }

            // default return
            Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_CREATION_FAILED'));
            return false;
    }

    /**
     * Update an existing temporal
     * @param int $temporal_id id of the specific temporal
     * @param string $temporal_text new text of the specific temporal
     * @return bool feedback (was the update successful ?)
     */
    public static function updateTemporal($temporal_id, $temporal_name, $temporal_motivo, $temporal_patologia, $temporal_profesional, $temporal_edad, $temporal_fur, $temporal_semanas, $temporal_dias, $temporal_fpp)
    {
        if (!$temporal_id || !$temporal_id) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "UPDATE temporales SET temporal_name = :temporal_name, temporal_motivo = :temporal_motivo, temporal_patologia = :temporal_patologia, temporal_profesional = :temporal_profesional, temporal_edad = :temporal_edad, temporal_fur = :temporal_fur, temporal_semanas = :temporal_semanas, temporal_dias = :temporal_dias, temporal_fpp = :temporal_fpp WHERE temporal_id = :temporal_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':temporal_id' => $temporal_id, ':temporal_name' => $temporal_name, ':temporal_motivo' => $temporal_motivo, ':temporal_patologia' => $temporal_patologia, ':temporal_profesional' => $temporal_profesional, ':temporal_edad' => $temporal_edad, ':temporal_fur' => $temporal_fur, ':temporal_semanas' => $temporal_semanas, ':temporal_dias' => $temporal_dias, ':temporal_fpp' => $temporal_fpp));

        if ($query->rowCount() == 1) {
            return true;
        }

        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_EDITING_FAILED'));
        return false;
    }

    public static function updateUno($temporal_id, $temptable_id, $temptable_eg, $temptable_lcn, $temptable_saco, $temptable_fecha, $temptable_citaprimtrim, $temptable_consentimiento)
    {
        if (!$temporal_id || !$temporal_id) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "UPDATE temptable SET temptable_rut = :temptable_rut, temptable_eg = :temptable_eg, temptable_lcn = :temptable_lcn, temptable_saco = :temptable_saco, temptable_fecha = :temptable_fecha, temptable_citaprimtrim = :temptable_citaprimtrim, temptable_consentimiento = :temptable_consentimiento WHERE temptable_id = :temptable_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':temptable_rut' => $temporal_id, ':temptable_eg' => $temptable_eg, ':temptable_lcn' => $temptable_lcn, ':temptable_saco' => $temptable_saco, ':temptable_id' => $temptable_id, ':temptable_fecha' => $temptable_fecha, ':temptable_citaprimtrim' => $temptable_citaprimtrim, ':temptable_consentimiento' => $temptable_consentimiento));

        if ($query->rowCount() == 1) {
            return true;
        }

        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_EDITING_FAILED'));
        return false;
    }

    public static function updateDos($tempdostable_id, $tempdostable_correlativo,$tempdostable_eg, $tempdostable_dbp, $tempdostable_dof, $tempdostable_cc, $tempdostable_ca, $tempdostable_lf, $tempdostable_bvm, $tempdostable_lh, $tempdostable_cerebelo, $tempdostable_pfe, $tempdostable_egP50, $tempdostable_presentacion, $tempdostable_dorso, $tempdostable_fcf, $tempdostable_sexo,$tempdostable_morfo, $tempdostable_anatomia, $tempdostable_ubicacion, $tempdostable_incersion, $tempdostable_grado, $tempdostable_liq, $tempdostable_cordon, $tempdostable_vasos, $tempdostable_comentario, $tempdostable_comentarios, $tempdostable_fecha, $tempdostable_citasegtrim, $tempdostable_consentimiento)
    {
        if (!$tempdostable_id || !$tempdostable_id) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "UPDATE tempdostable SET tempdostable_id = :tempdostable_id, tempdostable_eg = :tempdostable_eg, tempdostable_dbp = :tempdostable_dbp, tempdostable_dof = :tempdostable_dof, tempdostable_cc = :tempdostable_cc, tempdostable_ca = :tempdostable_ca, tempdostable_lf = :tempdostable_lf, tempdostable_bvm = :tempdostable_bvm, tempdostable_lh = :tempdostable_lh, tempdostable_cerebelo = :tempdostable_cerebelo, tempdostable_pfe = :tempdostable_pfe, tempdostable_egP50 = :tempdostable_egP50, tempdostable_presentacion = :tempdostable_presentacion, tempdostable_dorso = :tempdostable_dorso, tempdostable_fcf = :tempdostable_fcf, tempdostable_sexo = :tempdostable_sexo, tempdostable_morfo = :tempdostable_morfo, tempdostable_anatomia = :tempdostable_anatomia, tempdostable_ubicacion = :tempdostable_ubicacion, tempdostable_incersion = :tempdostable_incersion, tempdostable_grado = :tempdostable_grado, tempdostable_liq = :tempdostable_liq, tempdostable_cordon = :tempdostable_cordon, tempdostable_vasos = :tempdostable_vasos, tempdostable_comentario = :tempdostable_comentario, tempdostable_comentarios = :tempdostable_comentarios, tempdostable_fecha = :tempdostable_fecha, tempdostable_pctpfe = :tempdostable_pctpfe, tempdostable_pctca = :tempdostable_pctca, tempdostable_citasegtrim = :tempdostable_citasegtrim, tempdostable_citasegtrim = :tempdostable_citasegtrim WHERE tempdostable_correlativo = :tempdostable_correlativo  LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':tempdostable_id' => $tempdostable_id, ':tempdostable_correlativo' => $tempdostable_correlativo, ':tempdostable_eg' => $tempdostable_eg, ':tempdostable_dbp' => $tempdostable_dbp, ':tempdostable_dof' => $tempdostable_dof, ':tempdostable_cc' => $tempdostable_cc, ':tempdostable_ca' => $tempdostable_ca, ':tempdostable_lf' => $tempdostable_lf, ':tempdostable_bvm' => $tempdostable_bvm, ':tempdostable_lh' => $tempdostable_lh, ':tempdostable_cerebelo' => $tempdostable_cerebelo, ':tempdostable_pfe' => $tempdostable_pfe, ':tempdostable_egP50' => $tempdostable_egP50, ':tempdostable_presentacion' => $tempdostable_presentacion, ':tempdostable_dorso' => $tempdostable_dorso, ':tempdostable_fcf' => $tempdostable_fcf, ':tempdostable_sexo' => $tempdostable_sexo, ':tempdostable_morfo' => $tempdostable_morfo, ':tempdostable_anatomia' => $tempdostable_anatomia, ':tempdostable_ubicacion' => $tempdostable_ubicacion, ':tempdostable_incersion' => $tempdostable_incersion, ':tempdostable_grado' => $tempdostable_grado, ':tempdostable_liq' => $tempdostable_liq, ':tempdostable_cordon' => $tempdostable_cordon, ':tempdostable_vasos' => $tempdostable_vasos, ':tempdostable_comentario' => $tempdostable_comentario, ':tempdostable_comentarios' => $tempdostable_comentarios, ':tempdostable_fecha' => $tempdostable_fecha, ':tempdostable_pctpfe' => $tempdostable_pctpfe, ':tempdostable_pctca' => $tempdostable_pctca, ':tempdostable_citasegtrim' => $tempdostable_citasegtrim, ':tempdostable_citasegtrim' => $tempdostable_citasegtrim));

        if ($query->rowCount() == 1) {
            return true;
        }

        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_EDITING_FAILED'));
        return false;
    }


    public static function updateTres($temptrestable_id,$temptrestable_correlativo,$temptrestable_eg,$temptrestable_utd,$temptrestable_uti, $temptrestable_put, $temptrestable_au, $temptrestable_cm,$temptrestable_cp,$temptrestable_dv,$temptrestable_acm, $temptrestable_fecha, $temptrestable_citadoppler, $temptrestable_consentimiento)
    {
        if (!$temptrestable_id || strlen($temptrestable_id) == 0) {
            Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_CREATION_FAILED'));
            return false;
        }

            $database = DatabaseFactory::getFactory()->getConnection();

            $sql = "UPDATE temptrestable SET temptrestable_id = :temptrestable_id,temptrestable_eg = :temptrestable_eg,temptrestable_utd = :temptrestable_utd,temptrestable_uti = :temptrestable_uti,temptrestable_put = :temptrestable_put, temptrestable_au = :temptrestable_au, temptrestable_cm = :temptrestable_cm,temptrestable_cp = :temptrestable_cp,temptrestable_dv = :temptrestable_dv,temptrestable_acm = :temptrestable_acm, temptrestable_fecha = :temptrestable_fecha, temptrestable_citadoppler = :temptrestable_citadoppler, temptrestable_consentimiento = :temptrestable_consentimiento WHERE temptrestable_correlativo = :temptrestable_correlativo";
            $query = $database->prepare($sql);
            $query->execute(array(':temptrestable_id'=> $temptrestable_id,':temptrestable_correlativo'=> $temptrestable_correlativo,':temptrestable_eg'=> $temptrestable_eg,':temptrestable_utd'=> $temptrestable_utd,':temptrestable_uti'=> $temptrestable_uti,':temptrestable_put'=> $temptrestable_put, ':temptrestable_au'=> $temptrestable_au, ':temptrestable_cm'=> $temptrestable_cm,':temptrestable_cp'=> $temptrestable_cp,':temptrestable_dv'=> $temptrestable_dv,':temptrestable_acm' => $temptrestable_acm, ':temptrestable_fecha' => $temptrestable_fecha, ':temptrestable_citadoppler' => $temptrestable_citadoppler, ':temptrestable_consentimiento' => $temptrestable_consentimiento));

            if ($query->rowCount() == 1) {
                return true;
            }

            // default return
            Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_CREATION_FAILED'));
            return false;
    }

    /**
     * Delete a specific temporal
     * @param int $temporal_id id of the temporal
     * @return bool feedback (was the temporal deleted properly ?)
     */
    public static function deleteTemporal($temporal_id)
    {
        if (!$temporal_id) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "DELETE FROM temporales WHERE temporal_id = :temporal_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':temporal_id' => $temporal_id));

        if ($query->rowCount() == 1) {
            return true;
        }

        // default return
        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_DELETION_FAILED'));
        return false;
    }

    public static function deleteUno($temptable_id)
    {
        if (!$temptable_id) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "DELETE FROM temptable WHERE temptable_id = :temptable_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':temptable_id' => $temptable_id));

        if ($query->rowCount() == 1) {
            return true;
        }

        // default return
        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_DELETION_FAILED'));
        return false;
    }

    public static function deleteDos($tempdostable_id)
    {
        if (!$tempdostable_id) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "DELETE FROM tempdostable WHERE tempdostable_correlativo = :tempdostable_correlativo LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':tempdostable_correlativo' => $tempdostable_id));

        if ($query->rowCount() == 1) {
            return true;
        }

        // default return
        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_DELETION_FAILED'));
        return false;
    }

    public static function deleteTres($temptrestable_id)
    {
        if (!$temptrestable_id) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "DELETE FROM temptrestable WHERE temptrestable_correlativo = :temptrestable_correlativo LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':temptrestable_correlativo' => $temptrestable_id));

        if ($query->rowCount() == 1) {
            return true;
        }

        // default return
        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_DELETION_FAILED'));
        return false;
    }
}
