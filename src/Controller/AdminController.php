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


<<<<<<< HEAD
class AdminController extends Controller

{
	protected $db;

=======
class AdminController extends Controller// Contient mes actuels fichiers : controleradmin; controleradmincom;
						// controleraddpost; controleradminlist; controleradminpost; controlercomlist; controlerupdatepost.

{

	private $db;

	public function __construct() {

		$this->db = App::getDatabase();

	}
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4

	public function getListPosts() {

		
<<<<<<< HEAD
		$posts = parent::getListPosts();

		require('src/View/adminlist.php');
=======
		parent::getListPosts();

		require('../VIEW/adminlist.php');
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4

	}

	public function getPost() {


<<<<<<< HEAD
		$postunique = parent::getPost();
		$listcomment = parent::getComments();
		
		require('src/View/adminpost.php');
=======
		parent::getPost();

		require('../VIEW/adminpost.php');
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
	}


	public function deletePost() {

		$post = new Posts();

<<<<<<< HEAD
		$postsmanager = new PostsManager($this->db);
	
		$post->setId($_GET['id']);
		$postsmanager->delete($post);
		$posts = parent::getListPosts();

		

		require('src/View/adminlist.php');
=======
		$postsmanager = new PostsManager($bdd);
	
		$post->setId($_GET['id']);
		$postsmanager->delete($post);

		require('../VIEW/adminlist.php');
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
	}

	public function getAddPost() {

<<<<<<< HEAD
		require('src/View/addpost.php');
=======
		require('../VIEW/addpost.php');
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
	}

	public function addPost() {

		$post = new Posts();
<<<<<<< HEAD
		$postsmanager = new PostsManager($this->db);
=======
		$postsmanager = new PostsManager($bdd);
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4

		$post->setTitle($_POST['title']);
		$post->setPost($_POST['post']);
		$postsmanager->add($post);
<<<<<<< HEAD
		$posts = parent::getListPosts();

		require('src/View/adminlist.php');
=======

		require('../VIEW/adminlist.php');
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
	}


	public function getUpdatePost() {

<<<<<<< HEAD
		$postsmanager = new PostsManager($this->db);
=======
		$postsmanager = new PostsManager($bdd);
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4


		$postunique = $postsmanager->getUnique($_GET['id']);

<<<<<<< HEAD
		require('src/View/updatepost.php');
=======
		require('../VIEW/updatepost.php');
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
	}

	public function updatePost() {

		$post = new Posts();
<<<<<<< HEAD
		$postsmanager = new PostsManager($this->db);
=======
		$postsmanager = new PostsManager($bdd);
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4

		$post->setId($_GET['id']);
		$post->setTitle($_POST['title']);
		$post->setPost($_POST['post']);

		$postsmanager->update($post);

<<<<<<< HEAD
		$posts = parent::getListPosts();

		require('src/View/adminlist.php');
=======
		require('../VIEW/adminlist.php');
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
	}


	public function getListComments() {


<<<<<<< HEAD
		$commentsmanager = new CommentsManager($this->db);

		$listcomment = $commentsmanager->getListtotal();

		require('src/View/comlist.php');
=======
		$commentsmanager = new CommentsManager($bdd);

		$listcomment = $commentsmanager->getListtotal();

		require('../VIEW/comlist.php');
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4

	}

	public function getComment() {

	
<<<<<<< HEAD
		$commentunique = parent::getComment();
		$listanswer = parent::getAnswers();

		require('src/View/admincom.php');
=======
		parent::getComment();

		require('../VIEW/admincom.php');
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4

	}

	public function deleteComment() {

		$comment = new Comments();

<<<<<<< HEAD
		$commentsmanager = new CommentsManager($this->db);
		$postsmanager = new PostsManager($this->db);
=======
		$commentsmanager = new CommentsManager($bdd);
		$postsmanager = new PostsManager($bdd);
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4

		$postunique = $postsmanager->getUnique($_GET['id']);
		$listcomment = $commentsmanager->getListadmin();
		$comment->setId($_GET['idcom']);
		$commentsmanager->delete($comment);
<<<<<<< HEAD
		require('src/View/adminpost.php');
=======
		require('../VIEW/adminpost.php');
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
	}

	public function deleteCommentUnique() {

		$comment = new Comments();

<<<<<<< HEAD
		$commentsmanager = new CommentsManager($this->db);
=======
		$commentsmanager = new CommentsManager($bdd);
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4

		
		$comment->setId($_GET['id']);
		$commentsmanager->delete($comment);

<<<<<<< HEAD
		$commentsmanager = new CommentsManager($this->db);

		$listcomment = $commentsmanager->getListtotal();

	
	    require('src/View/comlist.php');
=======
	
	    require('../VIEW/comlist.php');
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
	}

	public function deleteCommentList() {


		$comment = new Comments();

<<<<<<< HEAD
		$commentsmanager = new CommentsManager($this->db);
=======
		$commentsmanager = new CommentsManager($bdd);
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
		$comment->setId($_GET['id']);
		$commentsmanager->delete($comment);
		$listcomment = $commentsmanager->getListtotal();

<<<<<<< HEAD
		require('src/View/comlist.php');
=======
		require('../VIEW/comlist.php');
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
	}

	public function deleteReport() {

		$comment = new Comments();

<<<<<<< HEAD
		$commentsmanager = new CommentsManager($this->db);
=======
		$commentsmanager = new CommentsManager($bdd);
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
		$comment->setId($_GET['id']);
		$commentsmanager->deletereport($comment);
		$listcomment = $commentsmanager->getListtotal();

<<<<<<< HEAD
		require('src/View/comlist.php');
=======
		require('../VIEW/comlist.php');
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4

	}

	public function deleteReportAdmin() {

		$comment = new Comments();

<<<<<<< HEAD
		$commentsmanager = new CommentsManager($this->db);
=======
		$commentsmanager = new CommentsManager($bdd);
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
		$comment->setId($_GET['id']);
		$commentsmanager->deletereport($comment);
		$listcomment = $commentsmanager->getListreports();

<<<<<<< HEAD
		require('src/View/administration.php');
=======
		require('../VIEW/administration.php');
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4

	}



	public function addAnswer() {

		parent::addAnswer();
<<<<<<< HEAD
		$commentunique = parent::getComment();
		$listanswer = parent::getAnswers();

		require('src/View/admincom.php');
=======

		require('../VIEW/admincom.php');
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4


	}

	public function deleteAnswer() {


<<<<<<< HEAD
		$commentsmanager = new CommentsManager($this->db);
		$answer = new Answers();

		$answersmanager = new AnswersManager($this->db);
=======
		$commentsmanager = new CommentsManager($bdd);
		$answer = new Answers();

		$answersmanager = new AnswersManager($bdd);
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4

		$commentunique = $commentsmanager->getUnique($_GET['id']);
		$listanswer = $answersmanager->getList();

		$answer->setId($_GET['idrep']);
		$answersmanager->delete($answer);

<<<<<<< HEAD
		require('src/View/admincom.php');
=======
		require('../VIEW/admincom.php');
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4

	}

	public function deleteReportAnswer() { 

<<<<<<< HEAD
		$commentsmanager = new CommentsManager($this->db);
		$answer = new Answers();

		$answersmanager = new AnswersManager($this->db);
=======
		$commentsmanager = new CommentsManager($bdd);
		$answer = new Answers();

		$answersmanager = new AnswersManager($bdd);
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4

		$answer->setId($_GET['idrep']);
		$answersmanager->deletereport($answer);
		$commentunique = $commentsmanager->getUnique($_GET['id']);
    	$listanswer = $answersmanager->getList();

<<<<<<< HEAD
		require('src/View/admincom.php');
=======
		require('../VIEW/admincom.php');
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4

	}

	public function connexionPage() {

<<<<<<< HEAD
		require('src/View/connexion.php');
=======
		require('../VIEW/connexion.php');
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4

	}

	public function admin() {

		$adminmanager = new AdminManager($this->db);

		$firstadmin = $adminmanager->getUnique();

		$commentsmanager = new CommentsManager($this->db);

		$listcomment = $commentsmanager->getListreports();
		
<<<<<<< HEAD
		 if ($_POST['user'] == $firstadmin->getUser()  && $_POST['password'] == $firstadmin->getPassword()) {

			
		 	$_SESSION['user'] = $firstadmin->getUser();
			$_SESSION['password'] = $firstadmin->getPassword();


			require('src/View/administration.php');
		 	
		 } else {
=======

		 if ($_POST['user'] == $firstadmin  && $_POST['password'] == $firstadmin['password']) {


		 	$_SESSION['user'] = $_POST['user'];
			$_SESSION['password'] = $_POST['password'];
		
			session_start();

			require('src/View/administration.php');
		 }
		
		else {
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4

			require('src/View/connexionerror.php');
		}
		

	}

<<<<<<< HEAD
	public function adminSession() {

			$commentsmanager = new CommentsManager($this->db);

			$listcomment = $commentsmanager->getListreports();

			
			require('src/View/administration.php');

	}

=======
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
	public function disconnexion() {

		session_destroy();

<<<<<<< HEAD
		$posts = parent::getListPosts();

		require('src/View/home.php');
	}

=======
		parent::getListPosts();

		require('../VIEW/home.php');
	}


>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
}