<?php
require_once "vendor/autoload.php";

use Smarty\Smarty;
use Oop2\Park;
use Oop2\Parks;
use Oop2\Review;
use Oop2\Reviews;
use Oop2\db;
use Oop2\User;
use Oop2\Userreview;
use Oop2\userPark;

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

if (!isset($_SESSION['parks1'])) {
    // Initialize parks if they don't exist
    $efteling = new Park("Efteling", "Een geweldig en indrukwekkend park!");
    $walibi = new Park("Walibi", "Het 'Thrillcapital' van Nederland!");

    // Create a new Parks instance and add the parks
    $parks1 = new Parks();
    $parks1->addPark($efteling);
    $parks1->addPark($walibi);

    // Store the Parks object in the session
    $_SESSION['parks1'] = $parks1;
} else {
    // Retrieve the existing Parks object from the session
    $parks1 = $_SESSION['parks1'];
}

switch ($action) {
    case "showParks":
        $template->assign('parks1', $parks1->getParks());
        $template->display('showpark.tpl');
        break;

    case "parkreviews":
        $parkName = $_GET['park'] ?? null;

        $selectedPark = $parks1->filterPark($parkName); // Filter

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

    case 'userreviews':
        $userReviews = UserReview::getAllReviews();

        // Fetch park names from the 'park' table
        $userparks = db::$db->select(['park' => ['name']], []);

        $template->assign('userreviews', $userReviews);
        $template->assign('userparks', $userparks); // Assign parks for the dropdown
        $template->display('userreviews.tpl');
        break;

    case 'parkForm':
        // Display the park form
        $template->display('parkForm.tpl');
        break;

    case "submitPark":
        // Handle park submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $parkName = $_POST['parkName'];

            // Check if the park already exists
            $existingPark = userPark::getParkByName($parkName);
            if ($existingPark) {
                $error = "Dit park bestaat al."; // Error message for park already existing
            } else {
                $parkData = [
                    'name' => $parkName
                ];

                // Add the park to the database
                if (userPark::createPark($parkData)) {
                    // Park successfully added
                    header("Location: index.php?action=userreviews"); // Redirect to the parks page
                    exit();
                } else {
                    $error = "Er is een fout opgetreden tijdens het toevoegen van het park."; // General error message
                }
            }
        }

        $template->assign('error', $error ?? null);
        $template->display('parkForm.tpl');
        break;


    case 'submitReview':
        if (!empty($_POST['parkname']) && !empty($_POST['rating']) && !empty($_POST['reviewcontext'])) {
            // Assuming user is logged in and their username is stored in the session
            $username = $_SESSION['user'];

            // Sanitize input
            $parkname = $_POST['parkname'];
            $rating = $_POST['rating'];
            $reviewcontext = $_POST['reviewcontext'];

            // Create and save the review
            UserReview::createReview($username, $parkname, $rating, $reviewcontext);

            // Redirect back to user reviews page after submission
            header("Location: index.php?action=userreviews");
            exit();
        } else {
            // Handle form validation error
            $template->assign('formError', 'Please fill in all fields.');
            $template->display('userreviews.tpl');
        }
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

$_SESSION['parks1'] = $parks1;
