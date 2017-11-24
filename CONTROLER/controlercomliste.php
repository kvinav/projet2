<?php
require '../APP/bootstrap.php';


$commentobj = new Comments();

$managercomment = new ManagerComments($bdd);

$listcomment = $managercomment->getListtotal();




if (!isset($_SESSION['user']) OR !isset($_SESSION['password']))
{
	header('Location: ../VIEW/connection.php');
}
if (isset($_SESSION['user']) && isset($_SESSION['password']) && isset($_GET['id']) && isset($_GET['supprimer']))
{
	$commentobj->setId($_GET['id']);
	$managercomment->delete($commentobj);
	$listcomment = $managercomment->getListtotal();

	include('../VIEW/comliste.php');
}
else if (isset($_GET['id']) && isset($_GET['supprimersignalement'])) 
{
	$commentobj->setId($_GET['id']);
	$managercomment->deletereport($commentobj);
	$listcomment = $managercomment->getListtotal();

	include('../VIEW/comliste.php');

}
else
{
include('../VIEW/comliste.php');
}
