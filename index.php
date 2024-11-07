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
        // Reviews ophalen uit de database met een functie
        $userReviews = Userreview::getAllReviews();

        //Parken van de DB ophalen
        $userparks = db::$db->select(['park' => ['name']], []);

        $template->assign('userreviews', $userReviews);
        $template->assign('userparks', $userparks); // Assign parks for the dropdown
        $template->display('userreviews.tpl');
        break;

    case 'parkForm':
        if (!isset($_SESSION['user'])) {
            header("Location: ./index.php?action=loginForm"); // Redirect als je niet ingelogd bent
            exit();
        }
        $template->display('parkForm.tpl');
        break;

    case "submitPark":
        if (!isset($_SESSION['user'])) {
            header("Location: ./index.php?action=loginForm"); // Redirect als je niet ingelogd bent
            exit();
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $parkName = $_POST['parkName'];

            // Checken of het park al bestaat
            $existingPark = userPark::getParkByName($parkName);
            if ($existingPark) {
                $error = "Dit park bestaat al. Voer A.U.B. een ander park in.";
            } else {
                $parkData = [
                    'name' => $parkName
                ];

                // Voeg park toe aan de database
                if (userPark::createPark($parkData)) {
                    header("Location: index.php?action=userreviews");
                    exit();
                } else {
                    $error = "Er is een fout opgetreden tijdens het toevoegen van het park.";
                }
            }
        }

        $template->assign('error', $error ?? null);
        $template->display('parkForm.tpl');
        break;


    case 'submitReview':
        if (!empty($_POST['parkname']) && !empty($_POST['rating']) && !empty($_POST['reviewcontext'])) {
            $username = $_SESSION['user']; // User staat automatisch in het form
            $parkname = $_POST['parkname'];
            $rating = $_POST['rating'];
            $reviewcontext = $_POST['reviewcontext'];

            // Review aanmaken en opslaan in de DB
            UserReview::createReview($username, $parkname, $rating, $reviewcontext);

            header("Location: index.php?action=userreviews");
            exit();
        } else {
            $template->assign('formError', 'Vul a.u.b. alle velden in.');
            $template->display('userreviews.tpl');
        }
        break;

    case "register":
        if (isset($_SESSION['user'])) {
            header("Location: ./index.php"); // Redirect als je al ingelogd ben
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];


            $existingUser = User::getUserByUsername($username);
            if ($existingUser) {
                $error = "Deze gebruikersnaam is al in gebruik."; // Error als gebruikersnaam al is geregistreerd
            } else {
                $existingEmail = User::getUserByEmail($email);
                if ($existingEmail) {
                    $error = "Dit emailadres is al geregistreerd."; // Error als email al is geregistreerd
                } else {
                    $userData = [
                        'username' => $username,
                        'email' => $email,
                        'password' => $password
                    ];


                    if (User::register($userData)) {
                        header("Location: index.php?action=login"); // redirect naar home als de login succesvol is
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

    case "loginForm": // Login form
        if (isset($_SESSION['user'])) {
            header("Location: ./index.php"); // Redirect als je al ingelogd ben
            exit();
        }
        $template->display('login.tpl');
        break;

    case "login": // login
        if (!empty($_POST["username"]) && !empty($_POST['password'])) {
            $user = new User();

            $userData = $user->getUserByUsername($_POST["username"]);

            if ($userData) {
                if (password_verify($_POST['password'], $userData['password'])) { // Wachtwoord verifieren
                    // Session aanwijzen
                    $_SESSION["user"] = $userData['username'];

                    header("Location: index.php");
                    exit();
                } else {
                    $template->assign("loginError", "Gebruikersnaam of wachtwoord is incorrect");
                }
            } else {
                $template->assign("loginError", "Gebruikersnaam of wachtwoord is incorrect");
            }
        } else {
            $template->assign("loginError", "Log hier in.");
        }
        $template->display('login.tpl');
        break;


    case "logout": // logout
        unset($_SESSION["user"]);
        header("Location: ./index.php");
        exit();

    case 'profile': //profiel case
        if (!isset($_SESSION['user'])) {
            header("Location: ./index.php?action=loginForm");
            exit();
        }

        $username = $_SESSION['user']; // User data ophalen, met hulp van de gebruikersnaam
        $userDetails = User::getUserByUsername($username);
        $userReviews = Userreview::getReviewsByUsername($username);

        if (isset($_GET['deletePost'])) { // Post verwijderen
            $postId = (int)$_GET['deletePost'];
            Userreview::deletePost($postId);
            header("Location: ./index.php?action=profile");
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['changePassword'])) { // Wachtwoord veranderen
            $newPassword = $_POST['newPassword'];
            User::changePassword($username, $newPassword);
            $message = "Wachtwoord succesvol veranderd.";
            $template->assign('message', $message);
        }

        $template->assign('userDetails', $userDetails);
        $template->assign('userReviews', $userReviews);
        $template->display('profile.tpl');
        break;


    default:
        $template->display('home.tpl');
        break;
}

$_SESSION['parks1'] = $parks1;
