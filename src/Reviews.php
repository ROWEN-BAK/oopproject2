<?php

namespace Oop2;

class Reviews
{
    private array $reviews = [];


    // Voeg een review aan een array toe
    public function addReview(Review $review): void
    {
        $this->reviews[] = $review;
    }

    // Getter
    public function getReviews(): array
    {
        return $this->reviews;
    }

    // Functie om reviews te filteren op basis van een park
    public function filterReviewsByPark(Park $park): array
    {
        return array_filter($this->reviews, function (Review $review) use ($park) {
            // Controleer of de review is gelinked aan het juiste park
            return $review->park->name === $park->name;
        });
    }
}
