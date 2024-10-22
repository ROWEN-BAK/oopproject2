<?php
require_once "vendor/autoload.php";

use Smarty\Smarty;
use Oop2\Park;
use Oop2\Parks;
use Oop2\Review;
use Oop2\Reviews;
use Oop2\db;
use Oop2\User;

$db = new db();

$template = new Smarty();
$template->setTemplateDir('templates');
$template->clearCompiledTemplate();
$template->clearAllCache();
session_start();
$action = $_GET['action'] ?? null;

$template->assign('isLoggedIn', isset($_SESSION['user']));

if (isset($_SESSION['user'])) {
    // Assign the logged-in user's username to the template
    $template->assign('username', $_SESSION['user']);
}

// Parks objecten aanmaken
if (!isset($_SESSION['parks'])) {
    // If statement als de parken nog niet bestaan, zodat ze worden toegevoegd.
    $efteling = new Park("Efteling", "Een geweldig en indrukwekkend park!");
    $walibi = new Park("Walibi", "Het 'Thrillcapital' van Nederland!");
// Hieronder staat de Parks array die ik uit de showParks case heb gehaald en het ipv dat het globaal hier heb neergezet
    //Array wordt aangemaakt en de parken worden eraan toegevoegd.
    $parks = new Parks();
    $parks->addPark($efteling);
    $parks->addPark($walibi);
    $_SESSION['parks'] = $parks;
} else {
    // Haal de bestaande parken uit de sessie
    $parks = $_SESSION['parks'];
}

switch ($action) {
    case "showParks":
        $template->assign('parks', $parks->getParks());
        $template->display('showpark.tpl');
        break;

    case "parkreviews":
        $parkName = $_GET['park'] ?? null;

        $selectedPark = $parks->filterPark($parkName); // Filter

        $selectedPark->loadReviews(); // Load reviews staat nu in de Park object.

        // Review verwerken en toevoegen in een array en de sessie
        if (isset($_POST['submit_form'])) {
            $rating = $_POST['rating'];
            $description = $_POST['description'];
            $newReview = new Review($rating, $description);
            $selectedPark->addReview($newReview);

            $_SESSION['reviews'][] = [
                'rating' => $rating,
                'description' => $description,
                'park' => $parkName
            ];

            header("Location: ./index.php?action=parkreviews&park=" . $parkName);
            exit();
        }

        $template->assign('reviews', $selectedPark->reviews->getReviews());
        $template->assign('park', $selectedPark);
        $template->display('parkreviews.tpl');
        break;

    case "userreviews":
        $template->display("userreviews.tpl");
        break;

    case "register":
        if (isset($_SESSION['user'])) {
            header("Location: ./index.php"); // Redirect to home if logged in
            exit();
        }
        // Handle user registration
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Check if the username already exists
            $existingUser = User::getUserByUsername($username);
            if ($existingUser) {
                $error = "Deze gebruikersnaam is al in gebruik.";
            } else {
                // Check if the email already exists
                $existingEmail = User::getUserByEmail($email);
                if ($existingEmail) {
                    $error = "Dit emailadres is al geregistreerd."; // New error message for email
                } else {
                    $userData = [
                        'username' => $username,
                        'email' => $email,
                        'password' => $password
                    ];

                    // Register the user
                    if (User::register($userData)) {
                        // Registration successful
                        header("Location: index.php?action=login"); // Redirect to login page
                        exit();
                    } else {
                        $error = "Er is een fout opgetreden tijdens registratie.";
                    }
                }
            }
        }

        $template->assign('error', $error ?? null);
        $template->display('register.tpl');
        break;

    case "loginForm":
        if (isset($_SESSION['user'])) {
            header("Location: ./index.php"); // Redirect to home if logged in
            exit();
        }
        $template->display('login.tpl'); // Just display the login form
        break;

    case "login":
        if (!empty($_POST["username"]) && !empty($_POST['password'])) {
            // Create a User object
            $user = new User();

            // Get user data based on username
            $userData = $user->getUserByUsername($_POST["username"]);

            // Check if user data is retrieved
            if ($userData) {
                // Use password_verify for password checking if passwords are hashed
                if (password_verify($_POST['password'], $userData['password'])) {
                    // Set session variable for user
                    $_SESSION["user"] = $userData['username'];

                    // Redirect to homepage
                    header("Location: index.php");
                    exit();
                } else {
                    $template->assign("loginError", "Username or password is incorrect");
                }
            } else {
                $template->assign("loginError", "Username or password is incorrect");
            }
        } else {
            $template->assign("loginError", "Please fill in all fields");
        }

        // Display the login template
        $template->display('login.tpl');
        break;



    case "logout":
        session_destroy(); // Destroy the session to log out the user
        header("Location: ./index.php"); // Redirect to the home page
        exit();


    default:
        $template->display('home.tpl');
        break;
}

$_SESSION['parks'] = $parks;
