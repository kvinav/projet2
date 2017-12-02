<?php

require '../APP/bootstrap.php';

class Controller

{

	public function getListPosts() {

		$postsmanager = new PostsManager($bdd);

		$posts = $postsmanager->getList();


	}

	public function getPost() {

		$postsmanager = new PostsManager($bdd);

		$commentsmanager = new CommentsManager($bdd);


		$postunique = $postsmanager->getUnique($_GET['id']);
		$listcomment = $commentsmanager->getListadmin();

	}

	public function getComment {

		$commentsmanager = new CommentsManager($bdd);

		$answersmanager = new AnswersManager($bdd);

		$commentunique = $commentsmanager->getUnique($_GET['id']);
		$listanswer = $answersmanager->getList();

	}

	public function addAnswer() {

		$answer = new Answers();

		$answersmanager = new AnswersManager($bdd);
		$commentsmanager = new CommentsManager($bdd);

		$answer->setPseudo($_POST['pseudo']);
		$answer->setAnswer($_POST['answer']);
		$answer->setId_comment($_GET['id']);

		$answersmanager->add($answer);
		$commentunique = $commentsmanager->getUnique($_GET['id']);
		$listanswer = $answersmanager->getList();

	}





}