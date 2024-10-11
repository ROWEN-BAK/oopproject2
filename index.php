<?php
require_once "vendor/autoload.php";

use Smarty\Smarty;
use Oop2\Park;
use Oop2\Parks;
use Oop2\Review;
use Oop2\Reviews;

session_start();

$template = new Smarty();
$template->setTemplateDir('templates');
$template->clearCompiledTemplate();
$template->clearAllCache();

$action = $_GET['action'] ?? null;
$efteling = new Park("Efteling", "Een geweldig en indrukwekkend park!");
$walibi = new Park("Walibi", "Het 'Thrillcapital' van Nederland!");

// functie buiten de case om reviews van de sessie in te laden.
function loadReviewsForPark(Park $park, string $parkName)
{
    if (!isset($_SESSION['reviews'])) {
        $_SESSION['reviews'] = [];
    }

    foreach ($_SESSION['reviews'] as $userReview) {
        if ($userReview['park'] === $parkName) {
            $park->addReview(new Review($userReview['rating'], $userReview['description']));
        }
    }
}


switch ($action) {
    case "showParks":
        $parks = new Parks();
        $parks->addPark($efteling);
        $parks->addPark($walibi);

        $template->assign('parks', $parks->getParks());
        $template->display('showpark.tpl');
        break;

    case "parkreviews":
        $parkName = $_GET['park'] ?? null; // parknaam ophalen van de url van showparks

    // $selectedPark krijgt of $efteling of $walibi aangewezen op basis van de $parkName. Dit wordt met een match gedaan
        $selectedPark = match ($parkName) {
            'Efteling' => $efteling,
            'Walibi' => $walibi,
        };

        //functie om de reviews in te laden voor een specifiek park
        loadReviewsForPark($selectedPark, $parkName);

        if (isset($_POST['submit_form'])) {
            $newReview = new Review($_POST['rating'], $_POST['description']);
            $selectedPark->addReview($newReview);
            $_SESSION['reviews'][] = [
                'rating' => $_POST['rating'],
                'description' => $_POST['description'],
                'park' => $_POST['park']
            ];

            header("Location: ./index.php?action=parkreviews&park=" . $parkName);
            exit();
        }

        $template->assign('reviews', $selectedPark->getReviews()); // Park wordt geassigned met de reviews getter en de "selectedpark"
        $template->assign('park', $selectedPark);
        $template->display('parkreviews.tpl');
        break;

    case "userreviews":
        $template->display("userreviews.tpl");
        break;

    default:
        $template->display('home.tpl');
        break;
}
