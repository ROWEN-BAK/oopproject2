<?php

namespace Oop2;

class Parks
{
    public Park $park;

    // Add Functie
    public function addPark(Park $park): void
    {
        $this->parks[] = $park;
    }


    // Getter
    public function getParks(): array
    {
        return $this->parks;
    }
}