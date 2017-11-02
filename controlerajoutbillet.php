<?php
session_start();
ini_set('display_errors', 'on');
error_reporting(E_ALL);

require 'autoloader.php';
Autoloader::register();

$bdd = new PDO('mysql:host=localhost;dbname=projet2;charset=utf8', 'root', '');

// Création des objets $billets et $manager
$billetobject = new Billets();

$manager = new ManagerBillets($bdd);

if (!isset($_SESSION['user']) OR !isset($_SESSION['password']))
{
	header('Location: connection.php');
}

//ajouter de billet grace au formulaire de la page ajout.php
if (isset($_POST['titre']) && isset($_POST['billet']))
{
	$billetobject->setTitre($_POST['titre']);
	$billetobject->setBillet($_POST['billet']);
	$manager->add($billetobject);

	header('Location: controleradminliste.php');
	
}

	include('ajoutbillet.php');


