<?php

class HoraModel
{

    public static function getAllHoras($hora_fecha)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT H.hora_id, H.hora_rut, H.hora_hora, A.paciente_nombre, A.paciente_apellido, A.paciente_prevision, H.hora_atencion, A.paciente_ciudad,  H.hora_situacion, E.ecografista_name, H.hora_cancelado FROM horas H INNER JOIN pacientes A ON H.hora_rut = A.paciente_rut INNER JOIN ecografistas E ON H.hora_ecografista = E.ecografista_id WHERE H.hora_fecha = :hora_fecha";
        $query = $database->prepare($sql);
        $query->execute(array(':hora_fecha' => $hora_fecha));

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetchAll();
    }

    /**
     * Get a single hora
     * @param int $hora_id id of the specific hora
     * @return object a single object (the result)
     */
    public static function getHora($hora_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT * FROM horas WHERE hora_id = :hora_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':hora_id' => $hora_id));

        // fetch() is the PDO method that gets a single result
        return $query->fetch();
    }

    /**
     * Set a hora (create a new one)
     * @param string $hora_text hora text that will be created
     * @return bool feedback (was the hora created properly ?)
     */
    public static function createHora($hora_rut, $hora_fecha, $hora_atencion, $hora_tipo, $hora_hora, $hora_cancelacion, $hora_cancelado, $hora_adicional, $hora_situacion, $hora_ecografista)
    {
        if (!$hora_fecha || strlen($hora_fecha) == 0) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "INSERT INTO horas (hora_rut, hora_fecha, hora_atencion, hora_tipo, hora_hora, hora_cancelacion, hora_cancelado, hora_adicional, hora_situacion, hora_ecografista) VALUES (:hora_rut, :hora_fecha, :hora_atencion, :hora_tipo, :hora_hora, :hora_cancelacion, :hora_cancelado, :hora_adicional, :hora_situacion, :hora_ecografista)";
        $query = $database->prepare($sql);
        $query->execute(array(':hora_rut' => $hora_rut, ':hora_fecha' => $hora_fecha, ':hora_atencion' => $hora_atencion, ':hora_tipo' => $hora_tipo, ':hora_hora' => $hora_hora, ':hora_cancelacion' => $hora_cancelacion, ':hora_cancelado' => $hora_cancelado, ':hora_adicional' => $hora_adicional, ':hora_situacion' => $hora_situacion, ':hora_ecografista' => $hora_ecografista));

        if ($query->rowCount() == 1) {
            return true;
        }

        return false;
    }

    /**
     * Update an existing hora
     * @param int $hora_id id of the specific hora
     * @param string $hora_text new text of the specific hora
     * @return bool feedback (was the update successful ?)
     */
    public static function updateHora($hora_id, $hora_fecha, $hora_atencion, $hora_tipo, $hora_hora, $hora_cancelacion, $hora_cancelado, $hora_adicional, $hora_situacion, $hora_ecografista)
    {
        if (!$hora_id || !$hora_fecha) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "UPDATE horas SET hora_fecha = :hora_fecha, hora_atencion = :hora_atencion, hora_tipo = :hora_tipo, hora_hora = :hora_hora, hora_cancelacion = :hora_cancelacion, hora_cancelado = :hora_cancelado, hora_adicional = :hora_adicional, hora_situacion = :hora_situacion, hora_ecografista = :hora_ecografista WHERE hora_id = :hora_id LIMIT 1";
        $query = $database->prepare($sql);

        $query->execute(array(':hora_id' => $hora_id, ':hora_fecha' => $hora_fecha, ':hora_atencion' => $hora_atencion, ':hora_tipo' => $hora_tipo, ':hora_hora' => $hora_hora, ':hora_cancelacion' => $hora_cancelacion, ':hora_cancelado' => $hora_cancelado, ':hora_adicional' => $hora_adicional, ':hora_situacion' => $hora_situacion, ':hora_ecografista' => $hora_ecografista));
        if ($query->rowCount() == 1) {
            return true;
        }

        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_EDITING_FAILED'));
        return false;
    }

    /**
     * Delete a specific hora
     * @param int $hora_id id of the hora
     * @return bool feedback (was the hora deleted properly ?)
     */
    public static function deleteHora($hora_id)
    {
        if (!$hora_id) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "DELETE FROM horas WHERE hora_id = :hora_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':hora_id' => $hora_id));

        if ($query->rowCount() == 1) {
            return true;
        }

        // default return
        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_DELETION_FAILED'));
        return false;
    }
}
