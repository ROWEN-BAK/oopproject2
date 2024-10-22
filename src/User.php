<?php

namespace Oop2;

class User
{
    public string $username;
    private string $email;
    private string $password; // Optional, if you store the password

    public function __construct($username = '', $email = '', $password = '') {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password; // Initialize if needed
    }

    public static function register(array $userData): bool
    {
        if (!isset($userData['username'], $userData['email'], $userData['password'])) {
            return false;
        }

        $userData['password'] = password_hash($userData['password'], PASSWORD_DEFAULT);

        db::$db->insert('user', [
            'username' => $userData['username'],
            'email' => $userData['email'],
            'password' => $userData['password']
        ]);

        return true;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public static function getUserByEmail(string $email): ?array
    {
        $result = db::$db->select(['user' => ['id', 'username', 'email', 'password']], ['user.email' => $email]);

        if (!empty($result)) {
            return $result[0]; // Return the first user found
        }

        return null; // Return null if no user found
    }


    public static function getUserByUsername(string $username): ?array
    {
        $result = db::$db->select(['user' => ['id', 'username', 'email', 'password']], ['user.username' => $username]);

        if (!empty($result)) {
            return $result[0];
        }

        return null;
    }


}
