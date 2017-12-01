<?php 

require '../APP/bootstrap.php';

class Controller // Contient mes actuels fichiers : controlercom; controlerpost; index;
					// controlerconnexion; controlerdisconnexion.

{

public function getlistPosts() {

	// Création des objets $billets et $manager
	$postobject = new Posts();

	$manager = new PostsManager($bdd);


//Renvoie la liste complète de tous les billets
	$posts = $manager->getList();



	require('../VIEW/home.php');

}

public function getPost() {


	$manager = new PostsManager($bdd);

	$postunique = $manager->getUnique($_GET['id']);

	$managercomment = new CommentsManager($bdd);

	$listcomment = $managercomment->getList();

	require('../VIEW/post.php');

}

public function getComment() {

	
	$managercomment = new CommentsManager($bdd);

	$manageranswers = new AnswersManager($bdd);

	$commentunique = $managercomment->getUnique($_GET['id']);
	$listanswer = $manageranswers->getList();

	require('../VIEW/comments.php');

}

public function addAnswer() {

	$answer = new Answers();

	$manageranswers = new AnswersManager($bdd);

	$answer->setPseudo($_POST['pseudo']);
	$answer->setAnswer($_POST['answer']);
	$answer->setId_comment($_GET['id']);

	$manageranswers->add($answer);
	$commentunique = $manager->getUnique($_GET['id']);
	$listanswer = $manageranswers->getList();

	require('../VIEW/comments.php');


}


}