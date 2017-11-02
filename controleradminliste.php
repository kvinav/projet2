<?php
session_start();
ini_set('display_errors', 'on');
error_reporting(E_ALL);

require 'autoloader.php';
Autoloader::register();


$bdd = new PDO('mysql:host=localhost;dbname=projet2;charset=utf8', 'root', '');

$billetobject = new Billets();

$manager = new ManagerBillets($bdd);

$billets = $manager->getList();

if (!isset($_SESSION['user']) OR !isset($_SESSION['password']))
{
	header('Location: connection.php');
}
else
{
include('adminliste.php');
}