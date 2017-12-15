<?php

namespace Blog\Controller;

use Blog\Model\PostsManager;
use Blog\Model\CommentsManager;
use Blog\Model\AnswersManager;
use Blog\Model\Answers;
use Blog\Model\App;


class Controller

{
	private $db;

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

		$commentsmanager = new CommentsManager($this->db);


		$postunique = $postsmanager->getUnique($_GET['id']);
		$listcomment = $commentsmanager->getList();
		
		return $postunique;

	}

	public function getComment() {

		$commentsmanager = new CommentsManager($this->db);

		$answersmanager = new AnswersManager($this->db);

		$commentunique = $commentsmanager->getUnique($_GET['id']);
		$listanswer = $answersmanager->getList();

	}

	public function addAnswer() {

		$answer = new Answers();

		$answersmanager = new AnswersManager($this->db);
		$commentsmanager = new CommentsManager($this->db);

		$answer->setPseudo($_POST['pseudo']);
		$answer->setAnswer($_POST['answer']);
		$answer->setId_comment($_GET['id']);

		$answersmanager->add($answer);
		$commentunique = $commentsmanager->getUnique($_GET['id']);
		$listanswer = $answersmanager->getList();

	}





}