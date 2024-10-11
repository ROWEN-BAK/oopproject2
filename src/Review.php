<?php

namespace Oop2;

class Review
{
    public float $rating;
    public string $description;

    public function __construct(float $rating, string $description)
    {
        $this->rating = $rating;
        $this->description = $description;
    }
}
