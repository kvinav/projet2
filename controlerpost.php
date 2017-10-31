<?php
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


// Si on rentre formulaire : ajouter commentaire et afficher liste commentaires
if (isset($_POST['pseudo']) && isset($_POST['commentaire']))
{
	$commentaireobj->setPseudo($_POST['pseudo']);
	$commentaireobj->setCommentaire($_POST['commentaire']);
	$commentaireobj->setId_billet($_GET['id']);

	$managercommentaire->add($commentaireobj);

	$billetunique = $manager->getUnique($_GET['id']);
	$listcommentaire = $managercommentaire->getList();
	
	include('post.php');
}

// Sinon : afficher liste commentaires
else
{
		$billetunique = $manager->getUnique($_GET['id']);
		$listcommentaire = $managercommentaire->getList();
	include('post.php');
}
?>