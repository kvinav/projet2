<?php
require '../APP/bootstrap.php';

$commentaireobj = new Commentaires();

$managercommentaire = new ManagerCommentaires($bdd);

$listcommentaire = $managercommentaire->getListtotal();


if (!isset($_SESSION['user']) OR !isset($_SESSION['password']))
{
	header('Location: ../VIEW/connection.php');
}
if (isset($_SESSION['user']) && isset($_SESSION['password']) && isset($_GET['id']) && isset($_GET['supprimer']))
{
	$commentaireobj->setId($_GET['id']);
	$managercommentaire->delete($commentaireobj);
	$listcommentaire = $managercommentaire->getListtotal();

	include('../VIEW/comliste.php');
}

else
{
include('../VIEW/comliste.php');
}
