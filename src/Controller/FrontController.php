<?php 

namespace Blog\Controller;

use Blog\Model\PostsManager;
use Blog\Model\CommentsManager;
use Blog\Model\AnswersManager;
use Blog\Model\Answers;
use Blog\Model\Posts;
use Blog\Model\Comments;
use Blog\Model\App;

class FrontController extends Controller 
{

	
	public function getListPosts() {

	
		$posts = parent::getListPosts();
		
		require('src/View/home.php');

	}

	public function getPost() {


		$postunique = parent::getPost();
		$listcomment = parent::getPost();
		
		
		require('src/View/post.php');

	}

	public function getComment() {

	
		parent::getComment();

		require('src/View/comments.php');

	}

	public function addComment() {

		$comment->setPseudo($_POST['pseudo']);
		$comment->setComment($_POST['comment']);
		$comment->setId_post($_GET['id']);

		$postsmanager = new PostsManager($this->db);
		$commentsmanager = new CommentsManager($this->db);

		$commentsmanager->add($comment);

		$postunique = $postsmanager->getUnique($_GET['id']);
		$listcomment = $commentsmanager->getList();

		require('src/View/post.php');

	}

	public function reportComment() {


		$commentsmanager = new CommentsManager($this->db);
		$commentunique = $commentsmanager->getUnique($_GET['idcom']);

		$commentsmanager->report($commentunique);

		$postsmanager = new PostsManager($this->db);

		$postunique = $postsmanager->getUnique($_GET['id']);

		$listcomment = $commentsmanager->getList();


		require('src/View/post.php');


	}

	
	public function addAnswer() {

		parent::addAnswer();

		require('src/View/comments.php');


	}

 
	public function reportAnswer() {

		$commentsmanager = new CommentsManager($this->db);

		$answersmanager = new AnswersManager($this->db);

		$answerunique = $answersmanager->getUnique($_GET['idrep']);

		$answersmanager->report($answerunique);
		$commentunique = $commentsmanager->getUnique($_GET['id']);
		$listanswer = $answersmanager->getList();

		require('src/View/comments.php');



	}

	public function about() {

		require('src/View/about.php');

	}

	public function notice() {

		require('src/View/notice.php');

	}

	
}