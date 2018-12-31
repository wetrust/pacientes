<?php

/**
 * MedicoModel
 * This is basically a simple CRUD (Create/Read/Update/Delete) demonstration.
 */
class MedicoModel
{
    /**
     * Get all medicos (medicos are just example data that the user has created)
     * @return array an array with several objects (the results)
     */
    public static function getAllMedicos()
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT medico_id, medico_name FROM medicos WHERE user_id = :user_id";
        $query = $database->prepare($sql);
        $query->execute(array(':user_id' => Session::get('user_id')));

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetchAll();
    }

    /**
     * Get a single medico
     * @param int $medico_id id of the specific medico
     * @return object a single object (the result)
     */
    public static function getMedico($medico_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT medico_id, medico_name FROM medicos WHERE user_id = :user_id AND medico_id = :medico_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':user_id' => Session::get('user_id'), ':medico_id' => $medico_id));

        // fetch() is the PDO method that gets a single result
        return $query->fetch();
    }

    /**
     * Set a medico (create a new one)
     * @param string $medico_name medico name that will be created
     * @return bool feedback (was the medico created properly ?)
     */
    public static function createMedico($medico_name)
    {
        if (!$medico_name || strlen($medico_name) == 0) {
            Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_CREATION_FAILED'));
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "INSERT INTO medicos (medico_name, user_id) VALUES (:medico_name, :user_id)";
        $query = $database->prepare($sql);
        $query->execute(array(':medico_name' => $medico_name, ':user_id' => Session::get('user_id')));

        if ($query->rowCount() == 1) {
            return true;
        }

        // default return
        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_CREATION_FAILED'));
        return false;
    }

    /**
     * Update an existing medico
     * @param int $medico_id id of the specific medico
     * @param string $medico_name new name of the specific medico
     * @return bool feedback (was the update successful ?)
     */
    public static function updateMedico($medico_id, $medico_name)
    {
        if (!$medico_id || !$medico_name) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "UPDATE medicos SET medico_name = :medico_name WHERE medico_id = :medico_id AND user_id = :user_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':medico_id' => $medico_id, ':medico_name' => $medico_name, ':user_id' => Session::get('user_id')));

        if ($query->rowCount() == 1) {
            return true;
        }

        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_EDITING_FAILED'));
        return false;
    }

    /**
     * Delete a specific medico
     * @param int $medico_id id of the medico
     * @return bool feedback (was the medico deleted properly ?)
     */
    public static function deleteMedico($medico_id)
    {
        if (!$medico_id) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "DELETE FROM medicos WHERE medico_id = :medico_id AND user_id = :user_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':medico_id' => $medico_id, ':user_id' => Session::get('user_id')));

        if ($query->rowCount() == 1) {
            return true;
        }

        // default return
        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_DELETION_FAILED'));
        return false;
    }
}
