<?php

namespace Oop2;

class Review
{
    public float $rating;
    public string $description;
    public Park $park;

    public static array $reviews = [];

    // Construct
    public function __construct(float $rating, string $description, Park $park)
    {
        $this->rating = $rating;
        $this->description = $description;
        $this->park = $park;
    }
}
