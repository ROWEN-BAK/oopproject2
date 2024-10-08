<?php

namespace Oop2;

class Parks
{
    public Park $park;

    // Voeg Park aan een Parks array toe
    public function addPark(Park $park): void
    {
        $this->parks[] = $park;
    }


    public function getParks(): array
    {
        return $this->parks;
    }
}