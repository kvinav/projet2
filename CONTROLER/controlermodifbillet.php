<?php
require '../APP/bootstrap.php';

// Création des objets $billets et $manager
$billet = new Billets();

$manager = new ManagerBillets($bdd);


	$billetunique = $manager->getUnique($_GET['id']);

if (!isset($_SESSION['user']) OR !isset($_SESSION['password']))
{
	header('Location: ../VIEW/connection.php');
}

//ajouter de billet grace au formulaire de la page ajout.php
if (isset($_SESSION['user']) && isset($_SESSION['password']) && isset($_POST['titre']) && isset($_POST['billet']))
{	
	
	$billet->setId($_GET['id']);
	$billet->setTitre($_POST['titre']);
	$billet->setBillet($_POST['billet']);

	$manager->update($billet);

	header('Location: ../CONTROLER/controleradminliste.php');
	
}

	include('../VIEW/modifbillet.php');

