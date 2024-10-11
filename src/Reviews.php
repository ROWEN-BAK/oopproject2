<?php

namespace Oop2;

class Reviews
{
    private array $reviews = [];


    public function addReview(Review $review)
    {
        $this->reviews[] = $review;
    }

    // Getter
    public function getReviews(): array
    {
        return $this->reviews;
    }
}


