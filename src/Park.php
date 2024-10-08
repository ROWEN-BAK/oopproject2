<?php

namespace Oop2;

class Park
{
    public string $name;
    public string $description;

    public static array $parks = [];

    // construct
    public function __construct(string $name, string $description) {
        $this->name = $name;
        $this->description = $description;
    }

}
