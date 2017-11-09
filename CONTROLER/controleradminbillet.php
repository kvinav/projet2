<?php
require '../APP/bootstrap.php';
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
	header('Location: ../VIEW/connection.php');
}

if (isset($_GET['id']) && isset($_GET['supprimercom']))
{
	$commentaireobj->setId($_GET['id']);
	$managercommentaire->delete($commentaireobj);
	include_once('../VIEW/adminbillet.php');
}
elseif (isset($_GET['id']) && isset($_GET['supprimerbill'])) 
{
	$billet->setId($_GET['id']);
	$manager->delete($billet);

	header('Location: ../CONTROLER/controleradminliste.php');
}
else
{
	include_once('../VIEW/adminbillet.php');
}
