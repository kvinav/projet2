<?php
require '../APP/bootstrap.php';


$commentobj = new Comments();

$managercomment = new ManagerComments($bdd);

$listcomment = $managercomment->getListtotal();




if (!isset($_SESSION['user']) OR !isset($_SESSION['password']))
{
	header('Location: ../VIEW/connexion.php');
}
if (isset($_SESSION['user']) && isset($_SESSION['password']) && isset($_GET['id']) && isset($_GET['delete']))
{
	$commentobj->setId($_GET['id']);
	$managercomment->delete($commentobj);
	$listcomment = $managercomment->getListtotal();

	include('../VIEW/comlist.php');
}
else if (isset($_GET['id']) && isset($_GET['deletereport'])) 
{
	$commentobj->setId($_GET['id']);
	$managercomment->deletereport($commentobj);
	$listcomment = $managercomment->getListtotal();

	include('../VIEW/comlist.php');

}
else
{
include('../VIEW/comlist.php');
}
