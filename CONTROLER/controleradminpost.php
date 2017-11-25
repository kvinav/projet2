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
	header('Location: ../VIEW/connexion.php');
}

if (isset($_GET['id']) && isset($_GET['deletecom']))
{
	$commentobj->setId($_GET['id']);
	$managercomment->delete($commentobj);
	include_once('../VIEW/adminpost.php');
}
elseif (isset($_GET['id']) && isset($_GET['deletepost'])) 
{
	$post->setId($_GET['id']);
	$manager->delete($post);

	header('Location: ../CONTROLER/controleradminlist.php');
}
else
{
	include_once('../VIEW/adminpost.php');
}
