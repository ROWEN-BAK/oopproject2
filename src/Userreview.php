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

    public static function getPostsByUser($username): array
    {
        return db::$db->select(
            ['userreview' => ['id', 'parkname', 'rating', 'reviewcontext']],
            ['user' => $username]
        );
    }

    public static function getUserPosts($username) {
        return db::$db->select(
            ['userreview' => ['id', 'parkname', 'rating', 'reviewcontext']],
            ['user' => $username]
        );
    }
    public static function getReviewsByUsername(string $username): array
    {
        $reviews = db::$db->select(
            ['userreview' => ['id', 'user', 'parkname', 'rating', 'reviewcontext']],
            ['user' => $username] // Filter by the specified username
        );

        return $reviews; // Return the array of reviews for the specific user
    }

    public static function deletePost(int $id): bool
    {
        $result = db::$db->delete('userreview', ['id' => $id]);

        return $result > 0;
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
