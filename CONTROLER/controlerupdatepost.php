<?php
require '../APP/bootstrap.php';

// Création des objets $billets et $manager
$post = new Posts();

$manager = new PostsManager($bdd);


	$postunique = $manager->getUnique($_GET['id']);

if (!isset($_SESSION['user']) OR !isset($_SESSION['password']))
{
	header('Location: ../VIEW/connexion.php');
}


if (isset($_SESSION['user']) && isset($_SESSION['password']) && isset($_POST['title']) && isset($_POST['post']))
{	
	
	$post->setId($_GET['id']);
	$post->setTitle($_POST['title']);
	$post->setPost($_POST['post']);

	$manager->update($post);

	header('Location: ../CONTROLER/controleradminlist.php');
	
}

	include('../VIEW/updatepost.php');

