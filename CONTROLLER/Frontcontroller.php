<?php 

require '../APP/bootstrap.php';

class FrontController // Contient mes actuels fichiers : controlercom; controlerpost; index;
					// controlerconnexion; controlerdisconnexion.

{

	public function getlistPosts() {

	
		$postobject = new Posts();

		$manager = new PostsManager($bdd);

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

	public function addComment() {

		$commentobj->setPseudo($_POST['pseudo']);
		$commentobj->setComment($_POST['comment']);
		$commentobj->setId_post($_GET['id']);



		$managercomment->add($commentobj);

		$postunique = $manager->getUnique($_GET['id']);
		$listcomment = $managercomment->getList();

		require('../VIEW/post.php');

	}

	public function reportComment() {


		$managercomment = new CommentsManager($bdd);
		$commentunique = $managercomment->getUnique($_GET['idcom']);

		$managercomment->report($commentunique);

		$manager = new PostsManager($bdd);

		$postunique = $manager->getUnique($_GET['id']);

		$listcomment = $managercomment->getList();


		require('../VIEW/post.php');


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

 
	public function reportAnswer() {

		$manager = new CommentsManager($bdd);

		$manageranswers = new AnswersManager($bdd);

		$answerunique = $manageranswers->getUnique($_GET['idrep']);

		$manageranswers->report($answerunique);
		$commentunique = $manager->getUnique($_GET['id']);
		$listanswer = $manageranswers->getList();

		require('../VIEW/comments.php');



	}

	public function getAdmin() {

	}

}