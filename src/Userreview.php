<?php

namespace Oop2;

class Userreview
{
    public int $id;
    public string $user;
    public string $parkname;
    public string $rating;
    public string $reviewcontext;

    public function __construct($id, $user, $parkname, $rating, $reviewcontext)
    {
        $this->id = $id;
        $this->user = $user;
        $this->parkname = $parkname;
        $this->rating = $rating;
        $this->reviewcontext = $reviewcontext;
    }

    public static function getReviewsByUsername(string $username): array
    {
        $reviews = db::$db->select(
            ['userreview' => ['id', 'user', 'parkname', 'rating', 'reviewcontext']],
            ['user' => $username] // Filter Parken met gebruik van de gebruikersnaam
        );

        return $reviews;
    }

    public static function deletePost(int $id): bool // Post verwijder functie
    {
        $result = db::$db->delete('userreview', ['id' => $id]);

        return $result > 0;
    }

    public static function getAllReviews(): array // Alle reviews ophalen in een array
    {
        $reviews = db::$db->select(
            ['userreview' => ['id', 'user', 'parkname', 'rating', 'reviewcontext']],
            []
        );
        return array_map(function ($reviewData) {
            return new self(
                $reviewData['id'],
                $reviewData['user'],
                $reviewData['parkname'],
                $reviewData['rating'],
                $reviewData['reviewcontext']
            );
        }, $reviews);
    }

   // Review aanmaken
    public static function createReview($user, $parkname, $rating, $reviewcontext)
    {
        db::$db->insert(
            'userreview',
            [
                'user' => $user,
                'parkname' => $parkname,
                'rating' => $rating,
                'reviewcontext' => $reviewcontext
            ]
        );
    }
}
