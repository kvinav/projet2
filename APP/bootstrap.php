<?php

session_start();

date_default_timezone_set("Europe/Paris");


require 'config.php';
require '../MODEL/autoloader.php';
Autoloader::register();


$bdd = APP::getDatabase();