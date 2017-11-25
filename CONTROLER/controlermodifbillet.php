<?php
require '../APP/bootstrap.php';

// Création des objets $billets et $manager
$post = new Posts();

$manager = new ManagerPosts($bdd);


	$postunique = $manager->getUnique($_GET['id']);

if (!isset($_SESSION['user']) OR !isset($_SESSION['password']))
{
	header('Location: ../VIEW/connection.php');
}

//ajouter de billet grace au formulaire de la page ajout.php
if (isset($_SESSION['user']) && isset($_SESSION['password']) && isset($_POST['titre']) && isset($_POST['billet']))
{	
	
	$post->setId($_GET['id']);
	$post->setTitle($_POST['titre']);
	$post->setPost($_POST['billet']);

	$manager->update($post);

	header('Location: ../CONTROLER/controleradminliste.php');
	
}

	include('../VIEW/modifbillet.php');

