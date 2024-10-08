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

        $parklist = $parks->getParks();
        $template->assign('parks', $parklist);
        $template->display('showpark.tpl');
        break;

    case "parkreviews":
        $parkName = $_GET['park'] ?? null;

        // Maak de voorbeeldparken hier opnieuw.
        $efteling = new Park("Efteling", "Een geweldig en indrukwekkend park!");
        $walibi = new Park("Walibi", "Het 'Thrillcapital' van Nederland!");

        $reviews = new Reviews();
        // Voeg reviews toe aan de $reviews array, en assign ze aan het juiste park object (Ik heb een beetje bias naar Walibi toe)
        $reviews->addReview(new Review(4.0, "Fantastisch park! Het is alleen zeer druk wat wel vervelend kan zijn", $efteling));
        $reviews->addReview(new Review(4.0, "Heerlijke sfeer! De thematisering is fantastisch! Alleen zijn de meeste attracties niet heel erg spannend", $efteling));
        $reviews->addReview(new Review(5, "Geweldig park! Kan niet wachten om weer terug te komen!", $walibi));
        $reviews->addReview(new Review(4.5, "Een echt thrillcapital! Geweldige achtbanen!", $walibi));

        // Filter de reviews op basis van het park (thx jason)
        $selectedPark = ($parkName === 'Efteling') ? $efteling : $walibi; // als de parknaam Efteling is worden de geselecteerde reviews aan $efteling geassigned, zoniet worden ze aan $walibi geassigned
        $reviewlist = $reviews->filterReviewsByPark($selectedPark);

        $template->assign('reviews', $reviewlist);
        $template->assign('park', $selectedPark); // Dit is optioneel, maar het wordt hiermee veel makkelijker om de namen te tonen.
        $template->display('parkreviews.tpl');
        break;

    case "userreviews": //userreviews case die nog niet af is, omdat het een deel van het dB gedeelte wordt
        $template->display("userreviews.tpl");
        break;

    default: //default tpl
        $template->display('home.tpl');
        break;
}
