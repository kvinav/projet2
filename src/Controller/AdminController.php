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
	protected $db;


	public function getListPosts() {

		
		$posts = parent::getListPosts();

		require('src/View/adminlist.php');

	}

	public function getPost($id) {


		$postunique = parent::getPost($id);
		$listcomment = parent::getComments();
		
		require('src/View/adminpost.php');
	}


	public function deletePost($post) {

		$postsmanager = new PostsManager($this->db);
		
		$postsmanager->delete($post);
		$posts = parent::getListPosts();

		

		require('src/View/adminlist.php');
	}

	public function getAddPost() {

		require('src/View/addpost.php');
	}

	public function addPost($post) {

		$postsmanager = new PostsManager($this->db);
		
		$postsmanager->add($post);
		$posts = parent::getListPosts();

		require('src/View/adminlist.php');
	}


	public function getUpdatePost($id) {

		$postsmanager = new PostsManager($this->db);


		$postunique = $postsmanager->getUnique($id);

		require('src/View/updatepost.php');
	}

	public function updatePost($post) {

		
		$postsmanager = new PostsManager($this->db);

		$postsmanager->update($post);

		$posts = parent::getListPosts();

		require('src/View/adminlist.php');
	}


	public function getListComments() {


		$commentsmanager = new CommentsManager($this->db);

		$listcomment = $commentsmanager->getListtotal();

		require('src/View/comlist.php');

	}

	public function getComment($id) {

	
		$commentunique = parent::getComment($id);
		$listanswer = parent::getAnswers();

		require('src/View/admincom.php');

	}

	public function deleteComment($comment, $id) {

		$commentsmanager = new CommentsManager($this->db);
		$postsmanager = new PostsManager($this->db);

		$postunique = $postsmanager->getUnique($id);
		

		$commentsmanager->delete($comment);
		$listcomment = $commentsmanager->getListadmin();
		require('src/View/adminpost.php');
	}

	public function deleteCommentUnique($comment) {


		$commentsmanager = new CommentsManager($this->db);

		$commentsmanager->delete($comment);

		$commentsmanager = new CommentsManager($this->db);

		$listcomment = $commentsmanager->getListtotal();

	
	    require('src/View/comlist.php');
	}

	public function deleteCommentList($comment) {


		$commentsmanager = new CommentsManager($this->db);
	
		$commentsmanager->delete($comment);
		$listcomment = $commentsmanager->getListtotal();

		require('src/View/comlist.php');
	}

	public function deleteReport($comment) {


		$commentsmanager = new CommentsManager($this->db);
		
		$commentsmanager->deletereport($comment);
		$listcomment = $commentsmanager->getListtotal();

		require('src/View/comlist.php');

	}

	public function deleteReportAdmin($comment) {

		
		$commentsmanager = new CommentsManager($this->db);

		$commentsmanager->deletereport($comment);
		$listcomment = $commentsmanager->getListreports();

		require('src/View/administration.php');

	}



	public function addAnswer($answer, $id) {

		parent::addAnswer($answer, $id);
		$commentunique = parent::getComment($id);
		$listanswer = parent::getAnswers();

		require('src/View/admincom.php');


	}

	public function deleteAnswer($answer, $id) {


		$commentsmanager = new CommentsManager($this->db);

		$answersmanager = new AnswersManager($this->db);

		$commentunique = $commentsmanager->getUnique($id);
		

		$answersmanager->delete($answer);
		$listanswer = $answersmanager->getList();
		require('src/View/admincom.php');

	}

	public function deleteReportAnswer($answer, $id) { 

		$commentsmanager = new CommentsManager($this->db);

		$answersmanager = new AnswersManager($this->db);

		$answersmanager->deletereport($answer);
		$commentunique = $commentsmanager->getUnique($id);
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

		$password = $_POST['password'];
		$hashpassword = $firstadmin->getPassword();
		
		 if ($_POST['user'] == $firstadmin->getUser() && password_verify($password, $hashpassword)) {


			require('src/View/administration.php');
		 	
		 } else {

			require('src/View/connexionerror.php');
		}
		

	}

	public function adminSession() {

			$commentsmanager = new CommentsManager($this->db);

			$listcomment = $commentsmanager->getListreports();

			
			require('src/View/administration.php');

	}

	public function disconnexion() {

		session_destroy();

		$posts = parent::getListPosts();

		require('src/View/home.php');
	}

}