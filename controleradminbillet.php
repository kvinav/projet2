<?php
session_start();
ini_set('display_errors', 'on');
error_reporting(E_ALL);

require 'autoloader.php';
Autoloader::register();

$bdd = new PDO('mysql:host=localhost;dbname=projet2;charset=utf8', 'root', '');

// Création des objets $billet et $manager
$billet = new Billets();

$manager = new ManagerBillets($bdd);

//Création des objets $commentaire et $managercommentaire
$commentaireobj = new Commentaires();

$managercommentaire = new ManagerCommentaires($bdd);


	$billetunique = $manager->getUnique($_GET['id']);
	$listcommentaire = $managercommentaire->getListadmin();

if (!isset($_SESSION['user']) OR !isset($_SESSION['password']))
{
	header('Location: connection.php');
}

if (isset($_GET['id']) && isset($_GET['supprimercom']))
{
	$commentaireobj->setId($_GET['id']);
	$managercommentaire->delete($commentaireobj);
	include_once('adminbillet.php');
}
elseif (isset($_GET['id']) && isset($_GET['supprimerbill'])) 
{
	$billet->setId($_GET['id']);
	$manager->delete($billet);

	header('Location: controleradminliste.php');
}
else
{
	include_once('adminbillet.php');
}
