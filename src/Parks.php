<?php

namespace Oop2;

class Parks
{
    public array $parks = [];

    public function addPark(Park $park): void
    {
        $this->parks[] = $park;
    }

    // Filter
    public function filterPark(string $parkName)
    {
        foreach ($this->parks as $park) {
            if ($park->name === $parkName) {
                return $park;
            }
        }
        return null;
    }

    public function getParks(): array
    {
        return $this->parks;
    }
}


