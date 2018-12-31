<?php

/**
 * LugarModel
 * This is basically a simple CRUD (Create/Read/Update/Delete) demonstration.
 */
class LugarModel
{
    /**
     * Get all lugares (lugares are just example data that the user has created)
     * @return array an array with several objects (the results)
     */
    public static function getAllLugares()
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT user_id, lugar_id, lugar_name FROM lugares WHERE user_id = :user_id";
        $query = $database->prepare($sql);
        $query->execute(array(':user_id' => Session::get('user_id')));

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetchAll();
    }

    /**
     * Get a single lugar
     * @param int $lugar_id id of the specific lugar
     * @return object a single object (the result)
     */
    public static function getLugar($lugar_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT user_id, lugar_id, lugar_name FROM lugares WHERE user_id = :user_id AND lugar_id = :lugar_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':user_id' => Session::get('user_id'), ':lugar_id' => $lugar_id));

        // fetch() is the PDO method that gets a single result
        return $query->fetch();
    }

    /**
     * Set a lugar (create a new one)
     * @param string $lugar_name lugar name that will be created
     * @return bool feedback (was the lugar created properly ?)
     */
    public static function createLugar($lugar_name)
    {
        if (!$lugar_name || strlen($lugar_name) == 0) {
            Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_CREATION_FAILED'));
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "INSERT INTO lugares (lugar_name, user_id) VALUES (:lugar_name, :user_id)";
        $query = $database->prepare($sql);
        $query->execute(array(':lugar_name' => $lugar_name, ':user_id' => Session::get('user_id')));

        if ($query->rowCount() == 1) {
            return true;
        }

        // default return
        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_CREATION_FAILED'));
        return false;
    }

    /**
     * Update an existing lugar
     * @param int $lugar_id id of the specific lugar
     * @param string $lugar_name new name of the specific lugar
     * @return bool feedback (was the update successful ?)
     */
    public static function updateLugar($lugar_id, $lugar_name)
    {
        if (!$lugar_id || !$lugar_name) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "UPDATE lugares SET lugar_name = :lugar_name WHERE lugar_id = :lugar_id AND user_id = :user_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':lugar_id' => $lugar_id, ':lugar_name' => $lugar_name, ':user_id' => Session::get('user_id')));

        if ($query->rowCount() == 1) {
            return true;
        }

        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_EDITING_FAILED'));
        return false;
    }

    /**
     * Delete a specific lugar
     * @param int $lugar_id id of the lugar
     * @return bool feedback (was the lugar deleted properly ?)
     */
    public static function deleteLugar($lugar_id)
    {
        if (!$lugar_id) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "DELETE FROM lugares WHERE lugar_id = :lugar_id AND user_id = :user_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':lugar_id' => $lugar_id, ':user_id' => Session::get('user_id')));

        if ($query->rowCount() == 1) {
            return true;
        }

        // default return
        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_DELETION_FAILED'));
        return false;
    }
}
