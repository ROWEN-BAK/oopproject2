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

switch($action)
{
    case "showParks":
        // Voorbeeldparken toevoegen
        $efteling = new Park("Efteling", "Een geweldig en indrukwekkend park!");
        $walibi = new Park("Walibi", "Het 'Thrillcapital' van Nederland!");

        $parks = new Parks();
        $parks->addPark($efteling);
        $parks->addPark($walibi);

        $parklist = $parks->getParks();
        $template->assign('parks', $parklist);
        $template->display('showpark.tpl');
        break;

    case "parkreviews":
        $parkName = $_GET['park'] ?? null;

        // Maak voorbeeldparken
        $efteling = new Park("Efteling", "Een geweldig en indrukwekkend park!");
        $walibi = new Park("Walibi", "Het 'Thrillcapital' van Nederland!");

        $reviews = new Reviews();
        // Voeg reviews toe met het park-object
        $reviews->addReview(new Review(4.0, "Fantastisch park! Het is alleen zeer druk wat wel vervelend kan zijn", $efteling));
        $reviews->addReview(new Review(4.7, "Heerlijke sfeer! De thematisering is fantastisch!", $efteling));
        $reviews->addReview(new Review(5, "Geweldig park! Kan niet wachten om weer terug te komen!", $walibi));
        $reviews->addReview(new Review(4.5, "Een echt thrillcapital! Geweldige achtbanen!", $walibi));

        // Filter de reviews op basis van het park
        $selectedPark = ($parkName === 'Efteling') ? $efteling : $walibi;
        $reviewlist = $reviews->filterReviewsByPark($selectedPark);

        $template->assign('reviews', $reviewlist);
        $template->assign('park', $selectedPark); // Dit is optioneel, maar handig voor de template
        $template->display('parkreviews.tpl');
        break;


    default:
        $template->display('home.tpl');
        break;
}
