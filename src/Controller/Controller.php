<?php

namespace Blog\Controller;

use Blog\Model\PostsManager;
use Blog\Model\CommentsManager;
use Blog\Model\AnswersManager;
use Blog\Model\Answers;
use Blog\Model\App;


abstract class Controller

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

	public function getPost($id) {

		$postsmanager = new PostsManager($this->db);


		$postunique = $postsmanager->getUnique($id);
		
		
		return $postunique;

	}


	public function getComments() {

		$commentsmanager = new CommentsManager($this->db);
		$listcomment = $commentsmanager->getList();

		return $listcomment;
	}
	
	public function getComment($id) {

		$commentsmanager = new CommentsManager($this->db);

		

		$commentunique = $commentsmanager->getUnique($id);

		
		return $commentunique;

	}

	public function getAnswers() {

		$answersmanager = new AnswersManager($this->db);

		$listanswer = $answersmanager->getList();

		return $listanswer;

	}

	public function addAnswer($answer, $id) {

		$answersmanager = new AnswersManager($this->db);

		$answersmanager->add($answer);

		return $answer;
		
	
	}





}