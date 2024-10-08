<?php

namespace Oop2;

class Reviews
{
    private array $reviews = [];


    // Array add functie
    public function addReview(Review $review): void
    {
        $this->reviews[] = $review;
    }

    // Getter
    public function getReviews(): array
    {
        return $this->reviews;
    }

    // Functie om reviews te filteren op basis van een park ( thx jason )
    public function filterReviewsByPark(Park $park): array
    {
        return array_filter($this->reviews, function (Review $review) use ($park) {
            // Controleer of de review is gelinked aan het juiste park met een array_filter
            return $review->park->name === $park->name;
        });
    }
}
