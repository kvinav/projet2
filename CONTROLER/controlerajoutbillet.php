<?php
require '../APP/bootstrap.php';

// Création des objets $billets et $manager
$billetobject = new Billets();

$manager = new ManagerBillets($bdd);

if (!isset($_SESSION['user']) OR !isset($_SESSION['password']))
{
	header('Location: ../VIEW/connection.php');
}

//ajouter de billet grace au formulaire de la page ajout.php
if (isset($_SESSION['user']) && isset($_SESSION['password']) && isset($_POST['titre']) && isset($_POST['billet']))
{
	$billetobject->setTitre($_POST['titre']);
	$billetobject->setBillet($_POST['billet']);
	$manager->add($billetobject);

	header('Location: ../CONTROLER/controleradminliste.php');
	
}

	include('../VIEW/ajoutbillet.php');


