<?php
require '../APP/bootstrap.php';

// Création des objets $billet et $manager
$post = new Posts();

$manager = new ManagerPosts($bdd);

//Création des objets $commentaire et $managercommentaire
$commentobj = new Comments();

$managercomment = new ManagerComments($bdd);


$answer = new Answers();

$manageranswers = new ManagerAnswers($bdd);


if (isset($_GET['idcom']) && isset($_GET['report']))
{	

	$commentunique = $managercomment->getUnique($_GET['idcom']);

	$managercomment->report($commentunique);

}

if (isset($_POST['pseudo']) && isset($_POST['comment']))
{
	$commentobj->setPseudo($_POST['pseudo']);
	$commentobj->setComment($_POST['comment']);
	$commentobj->setId_post($_GET['id']);



	$managercomment->add($commentobj);

	$postunique = $manager->getUnique($_GET['id']);
	$listcomment = $managercomment->getList();
	$listanswer = $manageranswers->getListtotal();
	
	include('../VIEW/post.php');
}


else
{
		$postunique = $manager->getUnique($_GET['id']);
		$listcomment = $managercomment->getList();
		$listanswer = $manageranswers->getListtotal();
	include('../VIEW/post.php');
}
?>