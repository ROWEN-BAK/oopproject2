<?php

namespace Oop2;

class User
{
    public string $username;
    private string $email;
    private string $password;

    public function __construct($username = '', $email = '', $password = '') {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    public static function register(array $userData): bool // register functie
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

    public static function getUserByEmail(string $email): ?array // Functie om user te vinden met gebruik van een email
    {
        $result = db::$db->select(['user' => ['id', 'username', 'email', 'password']], ['user.email' => $email]);

        if (!empty($result)) {
            return $result[0];
        }

        return null;
    }


    public static function getUserByUsername(string $username): ?array // Functie om user te vinden met gebruik van een gebruikersnaam
    {
        $result = db::$db->select(['user' => ['id', 'username', 'email', 'password']], ['user.username' => $username]);

        if (!empty($result)) {
            return $result[0];
        }

        return null;
    }

    public static function changePassword(string $username, string $newPassword): bool //ww verander functie
    {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $affectedRows = db::$db->update('user', ['password' => $hashedPassword], ['username' => $username]);
        return $affectedRows > 0;
    }



}
