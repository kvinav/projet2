<?php

session_start();

date_default_timezone_set("Europe/Paris");


require 'config.php';

function autoload($class){
	include 'Model/'.$class.'.php';
}

spl_autoload_register('autoload');

$bdd = App::getDatabase();