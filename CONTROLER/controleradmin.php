<?php
require '../APP/bootstrap.php';

$admin = new Admin();


$manageradmin = new AdminManager($bdd);

$firstadmin = $manageradmin->getUnique();

$managercomment = new CommentsManager($bdd);


$commentobj = new Comments();


$listcomment = $managercomment->getListreports();


if (isset($_POST['user']) && isset($_POST['password']) && $_POST['user'] == $firstadmin->getUser()  && $_POST['password'] == $firstadmin->getPassword())
{
	$_SESSION['user'] = $_POST['user'];
	$_SESSION['password'] = $_POST['password'];
	require_once('../VIEW/administration.php');
}
elseif (isset($_POST['user']) && isset($_POST['password']) && $_POST['user'] !== $firstadmin->getUser() || $_POST['password'] !== $firstadmin->getPassword()) 
{
	require_once('../VIEW/connexionerror.php');
}

else if (isset($_SESSION['user']) && isset($_SESSION['password']) && isset($_GET['id']) && isset($_GET['deletereport'])) 
{
	$commentobj->setId($_GET['id']);
	$managercomment->deletereport($commentobj);
	$listcomment = $managercomment->getListtotal();

	include('../VIEW/administration.php');

}

elseif (!isset($_POST['user']) OR !isset($_POST['password']))
{
	require_once('../VIEW/connexion.php');
}
else
{
	require_once('../VIEW/connexion.php');
}

