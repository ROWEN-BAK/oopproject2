<?php

namespace Oop2;

class userPark
{
    public int $id;
    public string $name;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    // Similar to getUserByUsername, but for park names
    public static function getParkByName(string $parkName)
    {
        // Query to check if a park with the given name exists
        $result = db::$db->select(['park' => ['id', 'name']], ['name' => $parkName]);

        if (!empty($result)) {
            $parkData = $result[0]; // Get the first result
            return new self($parkData['id'], $parkData['name']);
        }

        return null; // Return null if no park is found
    }

    public static function createPark(array $parkData): bool
    {
        if (!isset($parkData['name'])) {
            return false;
        }

        // Insert new park into the database
        db::$db->insert('park', [
            'name' => $parkData['name'],
        ]);

        return true;
    }
}
