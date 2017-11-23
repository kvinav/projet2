<?php

session_start();
date_default_timezone_set("Europe/Paris");

require 'config.php';
require '../MODEL/autoloader.php';
Autoloader::register();


$bdd = new PDO('mysql:host=avignonkevin.com.mysql;dbname=avignonkevin_com_monsite;charset=utf8', 'avignonkevin_com_monsite', 'kvinav');
