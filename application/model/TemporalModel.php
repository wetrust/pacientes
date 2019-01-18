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

        $sql = "SELECT user_id, temporal_id, temporal_text FROM temporales WHERE user_id = :user_id";
        $query = $database->prepare($sql);
        $query->execute(array(':user_id' => Session::get('user_id')));

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetchAll();
    }

    /**
     * Get a single temporal
     * @param int $temporal_id id of the specific temporal
     * @return object a single object (the result)
     */
    public static function getTemporal($temporal_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT temporal_id, temporal_name, temporal_motivo, temporal_patologia, temporal_profesional, temporal_edad FROM temporales WHERE temporal_id = :temporal_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':temporal_id' => $temporal_id));

        // fetch() is the PDO method that gets a single result
        return $query->fetch();
    }

    public static function checkTemporal($temporal_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT temporal_id, temporal_name, temporal_motivo, temporal_patologia, temporal_profesional, temporal_edad FROM temporales WHERE temporal_id = :temporal_id LIMIT 1";
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
    public static function createTemporal($temporal_id, $temporal_name, $temporal_motivo, $temporal_patologia, $temporal_profesional, $temporal_edad)
    {
        if (!$temporal_id || strlen($temporal_id) == 0) {
            Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_CREATION_FAILED'));
            return false;
        }

        $temporal = self::checkTemporal($temporal_id);

        if ($temporal){
            return self::updateTemporal($temporal_id, $temporal_name, $temporal_motivo, $temporal_patologia, $temporal_profesional, $temporal_edad);
        }
        else{
        
            $database = DatabaseFactory::getFactory()->getConnection();

            $sql = "INSERT INTO temporales (temporal_id, temporal_name, temporal_motivo, temporal_patologia, temporal_profesional, temporal_edad) VALUES (:temporal_id, :temporal_name, :temporal_motivo, :temporal_patologia, :temporal_profesional, :temporal_edad)";
            $query = $database->prepare($sql);
            $query->execute(array(':temporal_id' => $temporal_id, ':temporal_name' => $temporal_name, ':temporal_motivo' => $temporal_motivo, ':temporal_patologia' => $temporal_patologia, ':temporal_profesional' => $temporal_profesional, ':temporal_edad' => $temporal_edad));

            if ($query->rowCount() == 1) {
                return true;
            }

            // default return
            Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_CREATION_FAILED'));
            return false;
        }
    }

    /**
     * Update an existing temporal
     * @param int $temporal_id id of the specific temporal
     * @param string $temporal_text new text of the specific temporal
     * @return bool feedback (was the update successful ?)
     */
    public static function updateTemporal($temporal_id, $temporal_name, $temporal_motivo, $temporal_patologia, $temporal_profesional, $temporal_edad)
    {
        if (!$temporal_id || !$temporal_id) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "UPDATE temporales SET temporal_name = :temporal_name, temporal_motivo = :temporal_motivo, temporal_patologia = :temporal_patologia, temporal_profesional = :temporal_profesional, temporal_edad = :temporal_edad WHERE temporal_id = :temporal_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':temporal_id' => $temporal_id, ':temporal_name' => $temporal_name, ':temporal_motivo' => $temporal_motivo, ':temporal_patologia' => $temporal_patologia, ':temporal_profesional' => $temporal_profesional, ':temporal_edad' => $temporal_edad));

        if ($query->rowCount() == 1) {
            return true;
        }

        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_EDITING_FAILED'));
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
}
