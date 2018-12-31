<?php

/**
 * PrevisionModel
 * This is basically a simple CRUD (Create/Read/Update/Delete) demonstration.
 */
class PrevisionModel
{
    /**
     * Get all previsiones (previsiones are just example data that the user has created)
     * @return array an array with several objects (the results)
     */
    public static function getAllPrevisiones()
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT user_id, prevision_id, prevision_text FROM previsiones WHERE user_id = :user_id";
        $query = $database->prepare($sql);
        $query->execute(array(':user_id' => Session::get('user_id')));

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetchAll();
    }

    /**
     * Get a single prevision
     * @param int $prevision_id id of the specific prevision
     * @return object a single object (the result)
     */
    public static function getPrevision($prevision_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT user_id, prevision_id, prevision_text FROM previsiones WHERE user_id = :user_id AND prevision_id = :prevision_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':user_id' => Session::get('user_id'), ':prevision_id' => $prevision_id));

        // fetch() is the PDO method that gets a single result
        return $query->fetch();
    }

    /**
     * Set a prevision (create a new one)
     * @param string $prevision_text prevision text that will be created
     * @return bool feedback (was the prevision created properly ?)
     */
    public static function createPrevision($prevision_text)
    {
        if (!$prevision_text || strlen($prevision_text) == 0) {
            Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_CREATION_FAILED'));
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "INSERT INTO previsiones (prevision_text, user_id) VALUES (:prevision_text, :user_id)";
        $query = $database->prepare($sql);
        $query->execute(array(':prevision_text' => $prevision_text, ':user_id' => Session::get('user_id')));

        if ($query->rowCount() == 1) {
            return true;
        }

        // default return
        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_CREATION_FAILED'));
        return false;
    }

    /**
     * Update an existing prevision
     * @param int $prevision_id id of the specific prevision
     * @param string $prevision_text new text of the specific prevision
     * @return bool feedback (was the update successful ?)
     */
    public static function updatePrevision($prevision_id, $prevision_text)
    {
        if (!$prevision_id || !$prevision_text) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "UPDATE previsiones SET prevision_text = :prevision_text WHERE prevision_id = :prevision_id AND user_id = :user_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':prevision_id' => $prevision_id, ':prevision_text' => $prevision_text, ':user_id' => Session::get('user_id')));

        if ($query->rowCount() == 1) {
            return true;
        }

        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_EDITING_FAILED'));
        return false;
    }

    /**
     * Delete a specific prevision
     * @param int $prevision_id id of the prevision
     * @return bool feedback (was the prevision deleted properly ?)
     */
    public static function deletePrevision($prevision_id)
    {
        if (!$prevision_id) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "DELETE FROM previsiones WHERE prevision_id = :prevision_id AND user_id = :user_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':prevision_id' => $prevision_id, ':user_id' => Session::get('user_id')));

        if ($query->rowCount() == 1) {
            return true;
        }

        // default return
        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_DELETION_FAILED'));
        return false;
    }
}
