<?php

namespace Oop2;

class Parks
{
    public array $parks = [];

    public function addPark(Park $park)
    {
        $this->parks[] = $park;
    }

    public function getParks(): array
    {
        return $this->parks;
    }
}

