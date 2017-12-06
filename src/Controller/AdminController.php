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


class AdminController extends Controller// Contient mes actuels fichiers : controleradmin; controleradmincom;
						// controleraddpost; controleradminlist; controleradminpost; controlercomlist; controlerupdatepost.

{

	private $db;

	public function __construct() {

		$this->db = App::getDatabase();

	}

	public function getListPosts() {

		
		parent::getListPosts();

		require('../VIEW/adminlist.php');

	}

	public function getPost() {


		parent::getPost();

		require('../VIEW/adminpost.php');
	}


	public function deletePost() {

		$post = new Posts();

		$postsmanager = new PostsManager($bdd);
	
		$post->setId($_GET['id']);
		$postsmanager->delete($post);

		require('../VIEW/adminlist.php');
	}

	public function getAddPost() {

		require('../VIEW/addpost.php');
	}

	public function addPost() {

		$post = new Posts();
		$postsmanager = new PostsManager($bdd);

		$post->setTitle($_POST['title']);
		$post->setPost($_POST['post']);
		$postsmanager->add($post);

		require('../VIEW/adminlist.php');
	}


	public function getUpdatePost() {

		$postsmanager = new PostsManager($bdd);


		$postunique = $postsmanager->getUnique($_GET['id']);

		require('../VIEW/updatepost.php');
	}

	public function updatePost() {

		$post = new Posts();
		$postsmanager = new PostsManager($bdd);

		$post->setId($_GET['id']);
		$post->setTitle($_POST['title']);
		$post->setPost($_POST['post']);

		$postsmanager->update($post);

		require('../VIEW/adminlist.php');
	}


	public function getListComments() {


		$commentsmanager = new CommentsManager($bdd);

		$listcomment = $commentsmanager->getListtotal();

		require('../VIEW/comlist.php');

	}

	public function getComment() {

	
		parent::getComment();

		require('../VIEW/admincom.php');

	}

	public function deleteComment() {

		$comment = new Comments();

		$commentsmanager = new CommentsManager($bdd);
		$postsmanager = new PostsManager($bdd);

		$postunique = $postsmanager->getUnique($_GET['id']);
		$listcomment = $commentsmanager->getListadmin();
		$comment->setId($_GET['idcom']);
		$commentsmanager->delete($comment);
		require('../VIEW/adminpost.php');
	}

	public function deleteCommentUnique() {

		$comment = new Comments();

		$commentsmanager = new CommentsManager($bdd);

		
		$comment->setId($_GET['id']);
		$commentsmanager->delete($comment);

	
	    require('../VIEW/comlist.php');
	}

	public function deleteCommentList() {


		$comment = new Comments();

		$commentsmanager = new CommentsManager($bdd);
		$comment->setId($_GET['id']);
		$commentsmanager->delete($comment);
		$listcomment = $commentsmanager->getListtotal();

		require('../VIEW/comlist.php');
	}

	public function deleteReport() {

		$comment = new Comments();

		$commentsmanager = new CommentsManager($bdd);
		$comment->setId($_GET['id']);
		$commentsmanager->deletereport($comment);
		$listcomment = $commentsmanager->getListtotal();

		require('../VIEW/comlist.php');

	}

	public function deleteReportAdmin() {

		$comment = new Comments();

		$commentsmanager = new CommentsManager($bdd);
		$comment->setId($_GET['id']);
		$commentsmanager->deletereport($comment);
		$listcomment = $commentsmanager->getListreports();

		require('../VIEW/administration.php');

	}



	public function addAnswer() {

		parent::addAnswer();

		require('../VIEW/admincom.php');


	}

	public function deleteAnswer() {


		$commentsmanager = new CommentsManager($bdd);
		$answer = new Answers();

		$answersmanager = new AnswersManager($bdd);

		$commentunique = $commentsmanager->getUnique($_GET['id']);
		$listanswer = $answersmanager->getList();

		$answer->setId($_GET['idrep']);
		$answersmanager->delete($answer);

		require('../VIEW/admincom.php');

	}

	public function deleteReportAnswer() { 

		$commentsmanager = new CommentsManager($bdd);
		$answer = new Answers();

		$answersmanager = new AnswersManager($bdd);

		$answer->setId($_GET['idrep']);
		$answersmanager->deletereport($answer);
		$commentunique = $commentsmanager->getUnique($_GET['id']);
    	$listanswer = $answersmanager->getList();

		require('../VIEW/admincom.php');

	}

	public function connexionPage() {

		require('../VIEW/connexion.php');

	}

	public function admin() {

		$adminmanager = new AdminManager($this->db);

		$firstadmin = $adminmanager->getUnique();

		$commentsmanager = new CommentsManager($this->db);

		$listcomment = $commentsmanager->getListreports();
		

		 if ($_POST['user'] == $firstadmin  && $_POST['password'] == $firstadmin['password']) {


		 	$_SESSION['user'] = $_POST['user'];
			$_SESSION['password'] = $_POST['password'];
		
			session_start();

			require('src/View/administration.php');
		 }
		
		else {

			require('src/View/connexionerror.php');
		}
		

	}

	public function disconnexion() {

		session_destroy();

		parent::getListPosts();

		require('../VIEW/home.php');
	}


}