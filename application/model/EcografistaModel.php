<?php

/**
 * EcografistaModel
 * This is basically a simple CRUD (Create/Read/Update/Delete) demonstration.
 */
class EcografistaModel
{
    /**
     * Get all ecografistas (ecografistas are just example data that the user has created)
     * @return array an array with several objects (the results)
     */
    public static function getAllEcografistas()
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT ecografista_id, ecografista_name FROM ecografistas";
        $query = $database->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetchAll();
    }

    /**
     * Get a single ecografista
     * @param int $ecografista_id id of the specific ecografista
     * @return object a single object (the result)
     */
    public static function getEcografista($ecografista_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT ecografista_id, ecografista_name FROM ecografistas WHERE ecografista_id = :ecografista_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':ecografista_id' => $ecografista_id));

        // fetch() is the PDO method that gets a single result
        return $query->fetch();
    }

    /**
     * Set a ecografista (create a new one)
     * @param string $ecografista_name ecografista text that will be created
     * @return bool feedback (was the ecografista created properly ?)
     */
    public static function createEcografista($ecografista_name)
    {
        if (!$ecografista_name || strlen($ecografista_name) == 0) {
            Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_CREATION_FAILED'));
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "INSERT INTO ecografistas (ecografista_name) VALUES (:ecografista_name)";
        $query = $database->prepare($sql);
        $query->execute(array(':ecografista_name' => $ecografista_name));

        if ($query->rowCount() == 1) {
            return true;
        }

        // default return
        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_CREATION_FAILED'));
        return false;
    }

    /**
     * Update an existing ecografista
     * @param int $ecografista_id id of the specific ecografista
     * @param string $ecografista_name new text of the specific ecografista
     * @return bool feedback (was the update successful ?)
     */
    public static function updateEcografista($ecografista_id, $ecografista_name)
    {
        if (!$ecografista_id || !$ecografista_name) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "UPDATE ecografistas SET ecografista_name = :ecografista_name WHERE ecografista_id = :ecografista_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':ecografista_id' => $ecografista_id, ':ecografista_name' => $ecografista_name));

        if ($query->rowCount() == 1) {
            return true;
        }

        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_EDITING_FAILED'));
        return false;
    }

    /**
     * Delete a specific ecografista
     * @param int $ecografista_id id of the ecografista
     * @return bool feedback (was the ecografista deleted properly ?)
     */
    public static function deleteEcografista($ecografista_id)
    {
        if (!$ecografista_id) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "DELETE FROM ecografistas WHERE ecografista_id = :ecografista_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':ecografista_id' => $ecografista_id));

        if ($query->rowCount() == 1) {
            return true;
        }

        // default return
        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_DELETION_FAILED'));
        return false;
    }
}
