<?php

require_once "vendor/autoload.php";

use Smarty\Smarty;
use Oop2\Park;

session_start();

$template = new Smarty();
$template->setTemplateDir('templates');
$template->clearCompiledTemplate();
$template->clearAllCache();

$action = $_GET['action'] ?? null;
// Park::$parks = $_SESSION['parks'];



switch($action)
{
    //case "addParKForm":
     //   $template->display("addparkform");
    //break;
   // case "addPark":
    //    if(!empty($_POST['park']))
     //   {
     //       $park = new Park($_POST['park'])
    // break;
    // }
    case "showParks":
        $template->display('showpark.tpl');
    break;
    case "userreviews":
        $template->display('userreviews.tpl');
        break;
    case "Index":
        $template->display('index.tpl');
        break;
    case "efteling":
        $park1 = new Park("Bart Smit", "Geweldig park!", 4);
        $park2 = new Park("Ome Jans IIX", "Het park is leuk, groot en vooral gericht naar families. Het grootste probleem zal wel de prijs zijn en de drukte, de prijs is veelste hoog.", 3.5);
        $template->assign('park1', $park1);
        $template->assign('park2', $park2);
        $template->display('efteling.tpl');
        break;
    case "walibi":
        $park1 = new Park("Alberto Stegeman", "Om een lang verhaal kort te maken, het is geweldig voor de prijs! ", 5);
        $park2 = new Park("Hendrik Albert Hunniken", "Zeker weten het 'Thrillcapital' van Nederland en misschien van heel Europa! Ik kan niet genoeg krijgen van de leuke attracties, thema en achtbanen!", 5);
        $template->assign('park1', $park1);
        $template->assign('park2', $park2);
        $template->display('walibi.tpl');
        break;
    default:
        $template->display('home.tpl');

}

// $_SESSION['parks'] = Park::$parks;