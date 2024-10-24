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

    public static function getAllReviews(): array
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

    // Create a new review
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
