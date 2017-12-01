<?php
require '../APP/bootstrap.php';

$admin = new Admin();


$manageradmin = new AdminManager($bdd);

$firstadmin = $manageradmin->getUnique();

$commentobj = new Comments();

$managercomment = new CommentsManager($bdd);

$listcomment = $managercomment->getListreports();


if (isset($_POST['user']) && isset($_POST['password']) && $_POST['user'] == $firstadmin->getUser()  && $_POST['password'] == $firstadmin->getPassword())
{
	$_SESSION['user'] = $_POST['user'];
	$_SESSION['password'] = $_POST['password'];
	
	require_once('../VIEW/administration.php');
}

else if (isset($_POST['user']) && isset($_POST['password']))
{
	
	require_once('../VIEW/administration.php');
}
else if (isset($_SESSION['user']) && isset($_SESSION['password']) && isset($_GET['id']) && isset($_GET['deletereport'])) 
{
	$commentobj->setId($_GET['id']);
	$managercomment->deletereport($commentobj);
	$listcomment = $managercomment->getListtotal();

	include('../VIEW/administration.php');

}
else if (isset($_GET['connected']) == 1)
{
    
    include('../VIEW/administration.php');
}
else
{
	include('../VIEW/connexion.php');
}