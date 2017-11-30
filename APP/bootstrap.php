<?php

session_start();

date_default_timezone_set("Europe/Paris");


require 'config.php';
require '../MODEL/Autoloader.php';
Autoloader::register();
require '../vendor/autoload.php';
    
    $loader = new Twig_Loader_Filesystem('../VIEW'); // Dossier contenant les templates
    $twig = new Twig_Environment($loader, array('cache' => false));



$bdd = APP::getDatabase();