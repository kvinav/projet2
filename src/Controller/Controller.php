<?php

namespace Blog\Controller;

use Blog\Model\PostsManager;
use Blog\Model\CommentsManager;
use Blog\Model\AnswersManager;
use Blog\Model\Answers;
use Blog\Model\App;
<<<<<<< HEAD
=======
use Blog\Model\Database;
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4


class Controller

{
<<<<<<< HEAD
	protected $db;

	public function __construct() {

		$this->db = App::getDatabase();

	}

	public function getListPosts() {

		$postsmanager = new PostsManager($this->db);

		$posts = $postsmanager->getList();
		
=======

	public function getListPosts() {

		$postsmanager = new PostsManager($bdd);

		$posts = $postsmanager->getList();

>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
		return $posts;


	}

	public function getPost() {

<<<<<<< HEAD
		$postsmanager = new PostsManager($this->db);


		$postunique = $postsmanager->getUnique($_GET['id']);
		
		
		return $postunique;

	}


	public function getComments() {

		$commentsmanager = new CommentsManager($this->db);
		$listcomment = $commentsmanager->getList();

		return $listcomment;
	}
	
	public function getComment() {

		$commentsmanager = new CommentsManager($this->db);

		

		$commentunique = $commentsmanager->getUnique($_GET['id']);

		
		return $commentunique;

	}

	public function getAnswers() {

		$answersmanager = new AnswersManager($this->db);

		$listanswer = $answersmanager->getList();

		return $listanswer;

=======
		$postsmanager = new PostsManager($bdd);

		$commentsmanager = new CommentsManager($bdd);


		$postunique = $postsmanager->getUnique($_GET['id']);
		$listcomment = $commentsmanager->getListadmin();

	}

	public function getComment() {

		$commentsmanager = new CommentsManager($bdd);

		$answersmanager = new AnswersManager($bdd);

		$commentunique = $commentsmanager->getUnique($_GET['id']);
		$listanswer = $answersmanager->getList();

>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
	}

	public function addAnswer() {

		$answer = new Answers();

<<<<<<< HEAD
		$answersmanager = new AnswersManager($this->db);
		
		$answer->setPseudo($_POST['pseudo']);
		$answer->setAnswer($_POST['answer']);
		$answer->setId_comment($_GET['id']);
		
		$answersmanager->add($answer);

		return $answer;
		
	
=======
		$answersmanager = new AnswersManager($bdd);
		$commentsmanager = new CommentsManager($bdd);

		$answer->setPseudo($_POST['pseudo']);
		$answer->setAnswer($_POST['answer']);
		$answer->setId_comment($_GET['id']);

		$answersmanager->add($answer);
		$commentunique = $commentsmanager->getUnique($_GET['id']);
		$listanswer = $answersmanager->getList();

>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
	}





}