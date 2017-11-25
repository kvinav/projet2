<?php

session_start();

date_default_timezone_set("Europe/Paris");


require 'config.php';
require '../MODEL/Autoloader.php';
Autoloader::register();


$bdd = APP::getDatabase();