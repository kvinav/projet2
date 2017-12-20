<?php 

namespace Blog\Controller;

use Blog\Model\PostsManager;
use Blog\Model\CommentsManager;
use Blog\Model\AnswersManager;
use Blog\Model\Answers;
use Blog\Model\Posts;
use Blog\Model\Comments;
<<<<<<< HEAD
use Blog\Model\App;

class FrontController extends Controller 
{
	protected $db;
	
	public function getListPosts() {

	
		$posts = parent::getListPosts();
		
		require('src/View/home.php');
=======

class FrontController extends Controller // Contient mes actuels fichiers : controlercom; controlerpost; index;
					// controlerconnexion; controlerdisconnexion.

{

	public function getListPosts() {

	
		parent::getListPosts();

		require('../VIEW/home.php');
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4

	}

	public function getPost() {


<<<<<<< HEAD
		$postunique = parent::getPost();
		$listcomment = parent::getComments();
		
		
		require('src/View/post.php');
=======
		parent::getPost();

		require('../VIEW/post.php');
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4

	}

	public function getComment() {

	
<<<<<<< HEAD
		$commentunique = parent::getComment();
		$listanswer = parent::getAnswers();


		require('src/View/comments.php');
=======
		parent::getComment();

		require('../VIEW/comments.php');
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4

	}

	public function addComment() {

<<<<<<< HEAD
		$comment = new Comments();
=======
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
		$comment->setPseudo($_POST['pseudo']);
		$comment->setComment($_POST['comment']);
		$comment->setId_post($_GET['id']);

<<<<<<< HEAD
		$commentsmanager = new CommentsManager($this->db);

		$commentsmanager->add($comment);
		
		$postunique = parent::getPost();
		$listcomment = parent::getComments();

		require('src/View/post.php');
=======
		$postsmanager = new PostsManager($bdd);
		$commentsmanager = new CommentsManager($bdd);

		$commentsmanager->add($comment);

		$postunique = $postsmanager->getUnique($_GET['id']);
		$listcomment = $commentsmanager->getList();

		require('../VIEW/post.php');
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4

	}

	public function reportComment() {


<<<<<<< HEAD
		$commentsmanager = new CommentsManager($this->db);
=======
		$commentsmanager = new CommentsManager($bdd);
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
		$commentunique = $commentsmanager->getUnique($_GET['idcom']);

		$commentsmanager->report($commentunique);

<<<<<<< HEAD
		$postsmanager = new PostsManager($this->db);
=======
		$postsmanager = new PostsManager($bdd);
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4

		$postunique = $postsmanager->getUnique($_GET['id']);

		$listcomment = $commentsmanager->getList();


<<<<<<< HEAD
		require('src/View/post.php');
=======
		require('../VIEW/post.php');
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4


	}

	
	public function addAnswer() {

		parent::addAnswer();

<<<<<<< HEAD
		$commentunique = parent::getComment();
		$listanswer = parent::getAnswers();

		
		require('src/View/comments.php');
=======
		require('../VIEW/comments.php');
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4


	}

 
	public function reportAnswer() {

<<<<<<< HEAD
		$commentsmanager = new CommentsManager($this->db);

		$answersmanager = new AnswersManager($this->db);
=======
		$commentsmanager = new CommentsManager($bdd);

		$answersmanager = new AnswersManager($bdd);
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4

		$answerunique = $answersmanager->getUnique($_GET['idrep']);

		$answersmanager->report($answerunique);
<<<<<<< HEAD
		
		$commentunique = $commentsmanager->getUnique($_GET['id']);
		$listanswer = $answersmanager->getList();

		require('src/View/comments.php');
=======
		$commentunique = $commentsmanager->getUnique($_GET['id']);
		$listanswer = $answersmanager->getList();

		require('../VIEW/comments.php');
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4



	}

	public function about() {

<<<<<<< HEAD
		require('src/View/about.php');
=======
		require('../VIEW/about.php');
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4

	}

	public function notice() {

<<<<<<< HEAD
		require('src/View/notice.php');
=======
		require('../VIEW/notice.php');
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4

	}

	
}