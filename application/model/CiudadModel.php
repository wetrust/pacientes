<?php

/**
 * CiudadModel
 * This is basically a simple CRUD (Create/Read/Update/Delete) demonstration.
 */
class CiudadModel
{
    /**
     * Get all ciudades (ciudades are just example data that the user has created)
     * @return array an array with several objects (the results)
     */
    public static function getAllCiudades()
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT user_id, ciudad_id, ciudad_text FROM ciudades WHERE user_id = :user_id";
        $query = $database->prepare($sql);
        $query->execute(array(':user_id' => Session::get('user_id')));

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetchAll();
    }

    /**
     * Get a single ciudad
     * @param int $ciudad_id id of the specific ciudad
     * @return object a single object (the result)
     */
    public static function getCiudad($ciudad_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT user_id, ciudad_id, ciudad_text FROM ciudades WHERE user_id = :user_id AND ciudad_id = :ciudad_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':user_id' => Session::get('user_id'), ':ciudad_id' => $ciudad_id));

        // fetch() is the PDO method that gets a single result
        return $query->fetch();
    }

    /**
     * Set a ciudad (create a new one)
     * @param string $ciudad_text ciudad text that will be created
     * @return bool feedback (was the ciudad created properly ?)
     */
    public static function createCiudad($ciudad_text)
    {
        if (!$ciudad_text || strlen($ciudad_text) == 0) {
            Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_CREATION_FAILED'));
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "INSERT INTO ciudades (ciudad_text, user_id) VALUES (:ciudad_text, :user_id)";
        $query = $database->prepare($sql);
        $query->execute(array(':ciudad_text' => $ciudad_text, ':user_id' => Session::get('user_id')));

        if ($query->rowCount() == 1) {
            return true;
        }

        // default return
        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_CREATION_FAILED'));
        return false;
    }

    /**
     * Update an existing ciudad
     * @param int $ciudad_id id of the specific ciudad
     * @param string $ciudad_text new text of the specific ciudad
     * @return bool feedback (was the update successful ?)
     */
    public static function updateCiudad($ciudad_id, $ciudad_text)
    {
        if (!$ciudad_id || !$ciudad_text) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "UPDATE ciudades SET ciudad_text = :ciudad_text WHERE ciudad_id = :ciudad_id AND user_id = :user_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':ciudad_id' => $ciudad_id, ':ciudad_text' => $ciudad_text, ':user_id' => Session::get('user_id')));

        if ($query->rowCount() == 1) {
            return true;
        }

        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_EDITING_FAILED'));
        return false;
    }

    /**
     * Delete a specific ciudad
     * @param int $ciudad_id id of the ciudad
     * @return bool feedback (was the ciudad deleted properly ?)
     */
    public static function deleteCiudad($ciudad_id)
    {
        if (!$ciudad_id) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "DELETE FROM ciudades WHERE ciudad_id = :ciudad_id AND user_id = :user_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':ciudad_id' => $ciudad_id, ':user_id' => Session::get('user_id')));

        if ($query->rowCount() == 1) {
            return true;
        }

        // default return
        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_DELETION_FAILED'));
        return false;
    }
}
