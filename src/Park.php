<?php

namespace Oop2;

class Park
{
    public string $name;
    public string $description;
    public Reviews $reviews;

    public function __construct(string $name, string $description) {
        $this->name = $name;
        $this->description = $description;
        $this->reviews = new Reviews(); // Bij aanmaak van een park wordt er ook meteen een nieuwe reviews object aangemaakt (array)
    }

    public function addReview(Review $review): void
    {
        $this->reviews->addReview($review);
    }

    public function getReviews(): array
    {
        return $this->reviews->getReviews();
    }
}




