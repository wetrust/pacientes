<?php

/**
 * PacienteModel
 * This is basically a simple CRUD (Create/Read/Update/Delete) demonstration.
 */
class PacienteModel
{
    /**
     * Get all pacientes (pacientes are just example data that the user has created)
     * @return array an array with several objects (the results)
     */
    public static function getAllPacientes()
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT paciente_rut,paciente_nombre,paciente_apellido,paciente_telefono,paciente_email,paciente_prevision,paciente_ciudad,paciente_lugar,paciente_profesional,paciente_acompanantes FROM pacientes WHERE user_id = :user_id";
        $query = $database->prepare($sql);
        $query->execute(array(':user_id' => Session::get('user_id')));

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetchAll();
    }

    /**
     * Get a single paciente
     * @param int $paciente_id id of the specific paciente
     * @return object a single object (the result)
     */
    public static function getPaciente($paciente_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT user_id, paciente_id, paciente_text FROM pacientes WHERE user_id = :user_id AND paciente_id = :paciente_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':user_id' => Session::get('user_id'), ':paciente_id' => $paciente_id));

        // fetch() is the PDO method that gets a single result
        return $query->fetch();
    }

    /**
     * Set a paciente (create a new one)
     * @param string $paciente_text paciente text that will be created
     * @return bool feedback (was the paciente created properly ?)
     */
    public static function createPaciente($paciente_rut,$paciente_nombre,$paciente_apellido,$paciente_telefono,$paciente_email,$paciente_prevision,$paciente_ciudad,$paciente_lugar,$paciente_profesional,$paciente_acompanantes)
    {
        if (!$paciente_nombre || strlen($paciente_nombre) == 0) {
            Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_CREATION_FAILED'));
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "INSERT INTO pacientes (paciente_rut,paciente_nombre,paciente_apellido,paciente_telefono,paciente_email,paciente_prevision,paciente_ciudad,paciente_lugar,paciente_profesional,paciente_acompanantes) VALUES (:paciente_rut,:paciente_nombre,:paciente_apellido,:paciente_telefono,:paciente_email,:paciente_prevision,:paciente_ciudad,:paciente_lugar,:paciente_profesional,:paciente_acompanantes)";
        $query = $database->prepare($sql);
        $query->execute(array(':paciente_rut' => $paciente_rut,':paciente_nombre' => $paciente_nombre,':paciente_apellido' => $paciente_apellido,':paciente_telefono' => $paciente_telefono,':paciente_email' => $paciente_email,':paciente_prevision' => $paciente_prevision,':paciente_ciudad' => $paciente_ciudad,':paciente_lugar' => $paciente_lugar,':paciente_profesional' => $paciente_profesional,':paciente_acompanantes' => $paciente_acompanantes));

        if ($query->rowCount() == 1) {
            return true;
        }

        // default return
        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_CREATION_FAILED'));
        return false;
    }

    /**
     * Update an existing paciente
     * @param int $paciente_id id of the specific paciente
     * @param string $paciente_text new text of the specific paciente
     * @return bool feedback (was the update successful ?)
     */
    public static function updatePaciente($paciente_id, $paciente_text)
    {
        if (!$paciente_id || !$paciente_text) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "UPDATE pacientes SET paciente_text = :paciente_text WHERE paciente_id = :paciente_id AND user_id = :user_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':paciente_id' => $paciente_id, ':paciente_text' => $paciente_text, ':user_id' => Session::get('user_id')));

        if ($query->rowCount() == 1) {
            return true;
        }

        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_EDITING_FAILED'));
        return false;
    }

    /**
     * Delete a specific paciente
     * @param int $paciente_id id of the paciente
     * @return bool feedback (was the paciente deleted properly ?)
     */
    public static function deletePaciente($paciente_id)
    {
        if (!$paciente_id) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "DELETE FROM pacientes WHERE paciente_id = :paciente_id AND user_id = :user_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':paciente_id' => $paciente_id, ':user_id' => Session::get('user_id')));

        if ($query->rowCount() == 1) {
            return true;
        }

        // default return
        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_DELETION_FAILED'));
        return false;
    }
}
