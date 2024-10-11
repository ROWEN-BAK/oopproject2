<?php

namespace Oop2;

class Reviews
{
    private array $reviews = [];

    // Voeg deze functie toe
    public function addReview(Review $review)
    {
        $this->reviews[] = $review; // Voeg de review toe aan de array
    }

    // Getter
    public function getReviews(): array
    {
        return $this->reviews;
    }
}


