<?php
// basic smarty & composer dingen.
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

switch($action)
{
    case "showParks":
        // Voorbeeldparken toevoegen met een beschrijving, in dit geval doe ik de Efteling en Walibi
        $efteling = new Park("Efteling", "Een geweldig en indrukwekkend park!");
        $walibi = new Park("Walibi", "Het 'Thrillcapital' van Nederland!");

        $parks = new Parks();
        $parks->addPark($efteling);
        $parks->addPark($walibi);

        // array getter
        $parklist = $parks->getParks();

        //assigns
        $template->assign('parks', $parklist);
        $template->display('showpark.tpl');
        break;

    case "parkreviews":
        $parkName = $_GET['park'] ?? null; //GET om de url van het park te krijgen

        // 2 Voorbeeldparken
        $efteling = new Park("Efteling", "Een geweldig en indrukwekkend park!");
        $walibi = new Park("Walibi", "Het 'Thrillcapital' van Nederland!");

        // Initializeer de reviews in de sessie (als ze nog niet bestaan dan)
        if (!isset($_SESSION['reviews'])) {
            $_SESSION['reviews'] = [];
        }

        $reviews = new Reviews();

        // Laad de opgeslagen reviews uit de session
        foreach ($_SESSION['reviews'] as $userReview) {
            $reviews->addReview(new Review($userReview['rating'], $userReview['description'], $userReview['park']));
        }

        // Normale OOP reviews (normale input)
        $reviews->addReview(new Review(5, "Fantastisch park!", $efteling));
        $reviews->addReview(new Review(4.7, "Heerlijke sfeer!", $efteling));
        $reviews->addReview(new Review(5, "Geweldig park! Kan niet wachten om weer terug te komen!", $walibi));
        $reviews->addReview(new Review(4.5, "Een echt thrillcapital! Geweldige achtbanen!", $walibi));

        // Filter de reviews op basis van het park
        $selectedPark = ($parkName === 'Efteling') ? $efteling : $walibi;
        $reviewlist = $reviews->filterReviewsByPark($selectedPark);

        // Data van de form ophalen met een isset
        if (isset($_POST['submit_form'])) {
            $rating = $_POST['rating'];
            $description = $_POST['description'];
            $newReview = new Review($rating, $description, $selectedPark);
            $reviews->addReview($newReview);

            // Review opslaan in de session
            $_SESSION['reviews'][] = [
                'rating' => $rating,
                'description' => $description,
                'park' => $selectedPark
            ];

            //header om ervoor te zorgen dat de review zich niet telkens opnieuw plaatst in de website
            header("Location: ./index.php?action=parkreviews&park=" . $parkName);
            exit();
        }


        $template->assign('reviews', $reviewlist);
        $template->assign('park', $selectedPark);
        $template->display('parkreviews.tpl');
        break;




    case "userreviews": //userreviews case die nog niet af is, omdat het een deel van het dB gedeelte wordt
        $template->display("userreviews.tpl");
        break;

    default: //default tpl
        $template->display('home.tpl');
        break;
}
