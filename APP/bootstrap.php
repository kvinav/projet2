<?php
session_start();

require 'config.php';
require '../MODEL/autoloader.php';
Autoloader::register();


$bdd = new PDO('mysql:host=avignonkevin.com.mysql;dbname=avignonkevin_com_monsite;charset=utf8', 'avignonkevin_com_monsite', 'kvinav');