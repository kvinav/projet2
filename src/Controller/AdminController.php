<?php 

namespace Blog\Controller;

use Blog\Model\PostsManager;
use Blog\Model\CommentsManager;
use Blog\Model\AnswersManager;
use Blog\Model\AdminManager;
use Blog\Model\Answers;
use Blog\Model\Posts;
use Blog\Model\Comments;
use Blog\Model\App;


class AdminController extends Controller

{

	private $db;

	public function __construct() {

		$this->db = App::getDatabase();

	}

	public function getListPosts() {

		
		$posts = parent::getListPosts();

		require('src/View/adminlist.php');

	}

	public function getPost() {


		$postunique = parent::getPost();
		$listcomment = parent::getPost();
		require('src/View/adminpost.php');
	}


	public function deletePost() {

		$post = new Posts();

		$postsmanager = new PostsManager($this->db);
	
		$post->setId($_GET['id']);
		$postsmanager->delete($post);

		require('src/View/adminlist.php');
	}

	public function getAddPost() {

		require('src/View/addpost.php');
	}

	public function addPost() {

		$post = new Posts();
		$postsmanager = new PostsManager($this->db);

		$post->setTitle($_POST['title']);
		$post->setPost($_POST['post']);
		$postsmanager->add($post);

		require('src/View/adminlist.php');
	}


	public function getUpdatePost() {

		$postsmanager = new PostsManager($this->db);


		$postunique = $postsmanager->getUnique($_GET['id']);

		require('src/View/updatepost.php');
	}

	public function updatePost() {

		$post = new Posts();
		$postsmanager = new PostsManager($this->db);

		$post->setId($_GET['id']);
		$post->setTitle($_POST['title']);
		$post->setPost($_POST['post']);

		$postsmanager->update($post);

		require('src/View/adminlist.php');
	}


	public function getListComments() {


		$commentsmanager = new CommentsManager($this->db);

		$listcomment = $commentsmanager->getListtotal();

		require('src/View/comlist.php');

	}

	public function getComment() {

	
		parent::getComment();

		require('src/View/admincom.php');

	}

	public function deleteComment() {

		$comment = new Comments();

		$commentsmanager = new CommentsManager($this->db);
		$postsmanager = new PostsManager($this->db);

		$postunique = $postsmanager->getUnique($_GET['id']);
		$listcomment = $commentsmanager->getListadmin();
		$comment->setId($_GET['idcom']);
		$commentsmanager->delete($comment);
		require('src/View/adminpost.php');
	}

	public function deleteCommentUnique() {

		$comment = new Comments();

		$commentsmanager = new CommentsManager($this->db);

		
		$comment->setId($_GET['id']);
		$commentsmanager->delete($comment);

	
	    require('src/View/comlist.php');
	}

	public function deleteCommentList() {


		$comment = new Comments();

		$commentsmanager = new CommentsManager($this->db);
		$comment->setId($_GET['id']);
		$commentsmanager->delete($comment);
		$listcomment = $commentsmanager->getListtotal();

		require('src/View/comlist.php');
	}

	public function deleteReport() {

		$comment = new Comments();

		$commentsmanager = new CommentsManager($this->db);
		$comment->setId($_GET['id']);
		$commentsmanager->deletereport($comment);
		$listcomment = $commentsmanager->getListtotal();

		require('src/View/comlist.php');

	}

	public function deleteReportAdmin() {

		$comment = new Comments();

		$commentsmanager = new CommentsManager($this->db);
		$comment->setId($_GET['id']);
		$commentsmanager->deletereport($comment);
		$listcomment = $commentsmanager->getListreports();

		require('src/View/administration.php');

	}



	public function addAnswer() {

		parent::addAnswer();

		require('src/View/admincom.php');


	}

	public function deleteAnswer() {


		$commentsmanager = new CommentsManager($this->db);
		$answer = new Answers();

		$answersmanager = new AnswersManager($this->db);

		$commentunique = $commentsmanager->getUnique($_GET['id']);
		$listanswer = $answersmanager->getList();

		$answer->setId($_GET['idrep']);
		$answersmanager->delete($answer);

		require('src/View/admincom.php');

	}

	public function deleteReportAnswer() { 

		$commentsmanager = new CommentsManager($this->db);
		$answer = new Answers();

		$answersmanager = new AnswersManager($this->db);

		$answer->setId($_GET['idrep']);
		$answersmanager->deletereport($answer);
		$commentunique = $commentsmanager->getUnique($_GET['id']);
    	$listanswer = $answersmanager->getList();

		require('src/View/admincom.php');

	}

	public function connexionPage() {

		require('src/View/connexion.php');

	}

	public function admin() {

		$adminmanager = new AdminManager($this->db);

		$firstadmin = $adminmanager->getUnique();

		$commentsmanager = new CommentsManager($this->db);

		$listcomment = $commentsmanager->getListreports();
		

		 if ($_POST['user'] == $firstadmin->getUser()  && $_POST['password'] == $firstadmin->getPassword()) {

			session_start(); 
			

			require('src/View/administration.php');
		 	
		 } else {

			require('src/View/connexionerror.php');
		}
		

	}

	public function disconnexion() {

		session_destroy();

		parent::getListPosts();

		require('src/View/home.php');
	}

}