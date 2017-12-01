<?php

session_start();

date_default_timezone_set("Europe/Paris");


require 'config.php';

spl_autoload_register('app_autoload'); function app_autoload($class)
{ 
	require "../MODEL/$class.php"; 
}


$bdd = App::getDatabase();