<?php
require '../APP/bootstrap.php';

// Création des objets $billets et $manager
$postobject = new Posts();

$manager = new ManagerPosts($bdd);

if (!isset($_SESSION['user']) OR !isset($_SESSION['password']))
{
	header('Location: ../VIEW/connection.php');
}

//ajouter de billet grace au formulaire de la page ajout.php
if (isset($_SESSION['user']) && isset($_SESSION['password']) && isset($_POST['titre']) && isset($_POST['billet']))
{
	$postobject->setTitle($_POST['titre']);
	$postobject->setPost($_POST['billet']);
	$manager->add($postobject);

	header('Location: ../CONTROLER/controleradminliste.php');
	
}

	include('../VIEW/ajoutbillet.php');


