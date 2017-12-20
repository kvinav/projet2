<?php

namespace Blog\Controller;

use Blog\Model\PostsManager;
use Blog\Model\CommentsManager;
use Blog\Model\AnswersManager;
use Blog\Model\Answers;
use Blog\Model\App;


class Controller

{
	protected $db;

	public function __construct() {

		$this->db = App::getDatabase();

	}

	public function getListPosts() {

		$postsmanager = new PostsManager($this->db);

		$posts = $postsmanager->getList();
		
		return $posts;


	}

	public function getPost() {

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

	}

	public function addAnswer() {

		$answer = new Answers();

		$answersmanager = new AnswersManager($this->db);
		
		$answer->setPseudo($_POST['pseudo']);
		$answer->setAnswer($_POST['answer']);
		$answer->setId_comment($_GET['id']);
		
		$answersmanager->add($answer);

		return $answer;
		
	
	}





}