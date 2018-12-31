<?php

/**
 * MatronaModel
 * This is basically a simple CRUD (Create/Read/Update/Delete) demonstration.
 */
class MatronaModel
{
    /**
     * Get all matronas (matronas are just example data that the user has created)
     * @return array an array with several objects (the results)
     */
    public static function getAllMatronas()
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT matrona_id, matrona_name FROM matronas WHERE user_id = :user_id";
        $query = $database->prepare($sql);
        $query->execute(array(':user_id' => Session::get('user_id')));

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetchAll();
    }

    /**
     * Get a single matrona
     * @param int $matrona_id id of the specific matrona
     * @return object a single object (the result)
     */
    public static function getMatrona($matrona_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT matrona_id, matrona_name FROM matronas WHERE user_id = :user_id AND matrona_id = :matrona_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':user_id' => Session::get('user_id'), ':matrona_id' => $matrona_id));

        // fetch() is the PDO method that gets a single result
        return $query->fetch();
    }

    /**
     * Set a matrona (create a new one)
     * @param string $matrona_name matrona name that will be created
     * @return bool feedback (was the matrona created properly ?)
     */
    public static function createMatrona($matrona_name)
    {
        if (!$matrona_name || strlen($matrona_name) == 0) {
            Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_CREATION_FAILED'));
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "INSERT INTO matronas (matrona_name, user_id) VALUES (:matrona_name, :user_id)";
        $query = $database->prepare($sql);
        $query->execute(array(':matrona_name' => $matrona_name, ':user_id' => Session::get('user_id')));

        if ($query->rowCount() == 1) {
            return true;
        }

        // default return
        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_CREATION_FAILED'));
        return false;
    }

    /**
     * Update an existing matrona
     * @param int $matrona_id id of the specific matrona
     * @param string $matrona_name new name of the specific matrona
     * @return bool feedback (was the update successful ?)
     */
    public static function updateMatrona($matrona_id, $matrona_name)
    {
        if (!$matrona_id || !$matrona_name) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "UPDATE matronas SET matrona_name = :matrona_name WHERE matrona_id = :matrona_id AND user_id = :user_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':matrona_id' => $matrona_id, ':matrona_name' => $matrona_name, ':user_id' => Session::get('user_id')));

        if ($query->rowCount() == 1) {
            return true;
        }

        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_EDITING_FAILED'));
        return false;
    }

    /**
     * Delete a specific matrona
     * @param int $matrona_id id of the matrona
     * @return bool feedback (was the matrona deleted properly ?)
     */
    public static function deleteMatrona($matrona_id)
    {
        if (!$matrona_id) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "DELETE FROM matronas WHERE matrona_id = :matrona_id AND user_id = :user_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':matrona_id' => $matrona_id, ':user_id' => Session::get('user_id')));

        if ($query->rowCount() == 1) {
            return true;
        }

        // default return
        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_DELETION_FAILED'));
        return false;
    }
}