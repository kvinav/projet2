<?php
require '../APP/bootstrap.php';
// Création des objets $billet et $manager
$post = new Posts();

$manager = new ManagerPosts($bdd);

//Création des objets $commentaire et $managercommentaire
$commentobj = new Comments();

$managercomment = new ManagerComments($bdd);


	$postunique = $manager->getUnique($_GET['id']);
	$listcomment = $managercomment->getListadmin();

if (!isset($_SESSION['user']) OR !isset($_SESSION['password']))
{
	header('Location: ../VIEW/connection.php');
}

if (isset($_GET['id']) && isset($_GET['supprimercom']))
{
	$commentobj->setId($_GET['id']);
	$managercomment->delete($commentobj);
	include_once('../VIEW/adminbillet.php');
}
elseif (isset($_GET['id']) && isset($_GET['supprimerbill'])) 
{
	$post->setId($_GET['id']);
	$manager->delete($post);

	header('Location: ../CONTROLER/controleradminliste.php');
}
else
{
	include_once('../VIEW/adminbillet.php');
}
