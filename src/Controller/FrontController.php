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
	protected $db;
	
	public function getListPosts() {

	
		$posts = parent::getListPosts();
		
		require('src/View/home.php');

	}

	public function getPost($id) {


		$postunique = parent::getPost($id);
		$listcomment = parent::getComments();
		
		
		require('src/View/post.php');

	}

	public function getComment($id) {

	
		$commentunique = parent::getComment($id);
		$listanswer = parent::getAnswers();


		require('src/View/comments.php');

	}

	public function addComment($comment) {
		

		$commentsmanager = new CommentsManager($this->db);

		$commentsmanager->add($comment);
		
		$postunique = parent::getPost();
		$listcomment = parent::getComments();

		require('src/View/post.php');

	}

	public function reportComment($idcom, $id) {


		$commentsmanager = new CommentsManager($this->db);
		$commentunique = $commentsmanager->getUnique($idcom);

		$commentsmanager->report($commentunique);

		$postsmanager = new PostsManager($this->db);

		$postunique = $postsmanager->getUnique($id);

		$listcomment = $commentsmanager->getList();


		require('src/View/post.php');


	}

	
	public function addAnswer($answer, $id) {

		parent::addAnswer($answer, $id);

		$commentunique = parent::getComment($id);
		$listanswer = parent::getAnswers();

		
		require('src/View/comments.php');


	}

 
	public function reportAnswer($idrep, $id) {

		$commentsmanager = new CommentsManager($this->db);

		$answersmanager = new AnswersManager($this->db);

		$answerunique = $answersmanager->getUnique($idrep);

		$answersmanager->report($answerunique);
		
		$commentunique = $commentsmanager->getUnique($id);
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