<?php
require '../APP/bootstrap.php';

$admin = new Admin();


$manageradmin = new ManagerAdmin($bdd);

$firstadmin = $manageradmin->getUnique();

$managercommentaire = new ManagerCommentaires($bdd);


$commentaireobj = new Commentaires();


$listcommentaire = $managercommentaire->getListsignales();


if (isset($_POST['user']) && isset($_POST['password']) && $_POST['user'] == $firstadmin->getUser()  && $_POST['password'] == $firstadmin->getPassword())
{
	$_SESSION['user'] = $_POST['user'];
	$_SESSION['password'] = $_POST['password'];
	require_once('../VIEW/administration.php');
}
elseif (isset($_POST['user']) && isset($_POST['password']) && $_POST['user'] !== $firstadmin->getUser() || $_POST['password'] !== $firstadmin->getPassword()) 
{
	require_once('../VIEW/connectionerror.php');
}

else if (isset($_SESSION['user']) && isset($_SESSION['password']) && isset($_GET['id']) && isset($_GET['supprimersignalement'])) 
{
	$commentaireobj->setId($_GET['id']);
	$managercommentaire->supprimersignalement($commentaireobj);
	$listcommentaire = $managercommentaire->getListtotal();

	include('../VIEW/administration.php');

}

elseif (!isset($_POST['user']) OR !isset($_POST['password']))
{
	require_once('../VIEW/connection.php');
}
else
{
	require_once('../VIEW/connection.php');
}

