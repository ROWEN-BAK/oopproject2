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

    public static function getParkByName(string $parkName) // Park vinden met gebruik van het parknaam
    {
        $result = db::$db->select(['park' => ['id', 'name']], ['name' => $parkName]);

        if (!empty($result)) {
            $parkData = $result[0];
            return new self($parkData['id'], $parkData['name']);
        }

        return null;
    }

    public static function createPark(array $parkData): bool // Park aanmaken functie
    {
        if (!isset($parkData['name'])) {
            return false;
        }

        db::$db->insert('park', [
            'name' => $parkData['name'],
        ]);

        return true;
    }
}
