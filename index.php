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

    default:
        $template->display('home.tpl');
        break;
}
