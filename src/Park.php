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
        $this->reviews = new Reviews();
    }
    public function loadReviews(): void
    {
        // Haal de huidige reviews op vanuit de sessie
        if (!isset($_SESSION['reviews'])) {
            $_SESSION['reviews'] = [];
        }

        // Wis de bestaande reviewslijst om dubbele reviews te voorkomen (Wat echt heel irritant is)
        $this->reviews = new Reviews();

        // Voeg alleen reviews toe bij het geassignde park
        foreach ($_SESSION['reviews'] as $userReview) {
            if ($userReview['park'] === $this->name) {
                $this->reviews->addReview(new Review($userReview['rating'], $userReview['description']));
            }
        }
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




