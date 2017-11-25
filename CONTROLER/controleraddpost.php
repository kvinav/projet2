<?php
require '../APP/bootstrap.php';

$postobject = new Posts();

$manager = new ManagerPosts($bdd);

if (!isset($_SESSION['user']) OR !isset($_SESSION['password']))
{
	header('Location: ../VIEW/connexion.php');
}


if (isset($_SESSION['user']) && isset($_SESSION['password']) && isset($_POST['title']) && isset($_POST['post']))
{
	$postobject->setTitle($_POST['title']);
	$postobject->setPost($_POST['post']);
	$manager->add($postobject);

	header('Location: ../CONTROLER/controleradminlist.php');
	
}

	include('../VIEW/addpost.php');


