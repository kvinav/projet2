<?php 

require '../APP/bootstrap.php';

class FrontController extends Controller // Contient mes actuels fichiers : controlercom; controlerpost; index;
					// controlerconnexion; controlerdisconnexion.

{

	public function getListPosts() {

	
		parent::getListPosts();

		require('../VIEW/home.php');

	}

	public function getPost() {


		parent::getPost();

		require('../VIEW/post.php');

	}

	public function getComment() {

	
		parent::getComment();

		require('../VIEW/comments.php');

	}

	public function addComment() {

		$comment->setPseudo($_POST['pseudo']);
		$comment->setComment($_POST['comment']);
		$comment->setId_post($_GET['id']);

		$postsmanager = new PostsManager($bdd);
		$commentsmanager = new CommentsManager($bdd);

		$commentsmanager->add($comment);

		$postunique = $postsmanager->getUnique($_GET['id']);
		$listcomment = $commentsmanager->getList();

		require('../VIEW/post.php');

	}

	public function reportComment() {


		$commentsmanager = new CommentsManager($bdd);
		$commentunique = $commentsmanager->getUnique($_GET['idcom']);

		$commentsmanager->report($commentunique);

		$postsmanager = new PostsManager($bdd);

		$postunique = $postsmanager->getUnique($_GET['id']);

		$listcomment = $commentsmanager->getList();


		require('../VIEW/post.php');


	}

	
	public function addAnswer() {

		parent::addAnswer();

		require('../VIEW/comments.php');


	}

 
	public function reportAnswer() {

		$commentsmanager = new CommentsManager($bdd);

		$answersmanager = new AnswersManager($bdd);

		$answerunique = $answersmanager->getUnique($_GET['idrep']);

		$answersmanager->report($answerunique);
		$commentunique = $commentsmanager->getUnique($_GET['id']);
		$listanswer = $answersmanager->getList();

		require('../VIEW/comments.php');



	}

	public function about() {

		require('../VIEW/about.php');

	}

	public function notice() {

		require('../VIEW/notice.php');

	}

	
}