<?php

namespace Blog\MODEL;

class CommentsManager
{
	private $bdd;

	public function __construct($bdd)
	{
		$this->setBDD($bdd);
	}

	public function add(Comments $comment)
	{
		$req = $this->bdd->query('INSERT INTO comments (pseudo, comment, id_post, datecomment) VALUES(?, ?, ?, NOW())',
		                        [$comment->getPseudo(), $comment->getComment(), $comment->getId_post()]);


	}

	public function get($id)
	{
		$req = $this->bdd->query('SELECT pseudo, comment, report, DATE_FORMAT(datecomment, "%d/%m/%Y à %Hh%imin") AS datecomment FROM comments ORDER BY id');
		$donnees = $req->fetch(PDO::FETCH_ASSOC);

		$req->execute();
	}

	public function report(Comments $comment)
	{
		$req = $this->bdd->query('UPDATE comments SET report = ?, datereport = NOW() WHERE id = ?', 
		                        [$comment->getReport() + 1, $comment->getId()]
		                        );

	}
	public function deletereport(Comments $comment)
	{
		$req = $this->bdd->query('UPDATE comments SET report = ?, datereport = NULL WHERE id = ?',
		                        [0, $comment->getId()]
		                        );
		

	}

	public function getListadmin()
	{
		$commentsadmin = [];

		$req = $this->bdd->query('SELECT id, pseudo, comment, report, DATE_FORMAT(datecomment, "%d/%m/%Y à %Hh%imin") AS datecomment FROM comments                     WHERE id_post = ? ORDER BY report DESC, id DESC',
		                        [$_GET['id']]
		                        );


		while ($donnees = $req->fetch(PDO::FETCH_ASSOC))
		{
			$commentsadmin[] = new Comments($donnees);
		}

		return $commentsadmin;
	}

	public function getList()
	{
		$comments = [];

		$req = $this->bdd->query('SELECT id, pseudo, comment, report, DATE_FORMAT(datecomment, "%d/%m/%Y à %Hh%imin") AS datecomment FROM comments                      WHERE id_post = ? ORDER BY id',
		                        [$_GET['id']]
		                        );
	
		while ($donnees = $req->fetch(PDO::FETCH_ASSOC))
		{
			$comments[] = new Comments($donnees);
		}

		return $comments;
	}

	public function getListtotal()
	{
		$commentstotal = [];

		$req = $this->bdd->query('SELECT id, pseudo, comment, report, id_post, DATE_FORMAT(datecomment, "%d/%m/%Y à %Hh%imin") AS datecomment FROM comments ORDER BY id_post DESC, report DESC');
     

		while ($donnees = $req->fetch(PDO::FETCH_ASSOC))
		{
			$commentstotal[] = new Comments($donnees);
		}

		return $commentstotal;
	}
	
	public function getListreports()
	{
		$commentstotalreports = [];

		$req = $this->bdd->query('SELECT id, pseudo, comment, report, id_post, datereport, DATE_FORMAT(datecomment, "%d/%m/%Y à %Hh%imin") AS datecomment FROM comments ORDER BY datereport DESC LIMIT 0,5');
     

		while ($donnees = $req->fetch(PDO::FETCH_ASSOC))
		{
			$commentstotalreports[] = new Comments($donnees);
		}

		return $commentstotalreports;
	}
	public function getUnique($id)
    {
       
      $req = $this->bdd->query('SELECT id, pseudo, comment, report, id_post, DATE_FORMAT(datecomment, "%d/%m/%Y à %Hh%imin") AS datecomment FROM                          comments WHERE id = ?',
                                [$id]
                                );
     
      $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Comments');
      $commentunique = $req->fetch();
      return $commentunique;

    }

	public function update(Comments $comment)
	{
		$req = $this->bdd->query('UPDATE comments SET pseudo = ?, comment = ? WHERE id= :id',
		                        [$comment->getPseudo(), $comment->getComment()]
		                        );

	}

	public function delete(Comments $comment)
	{
		$this->bdd->exec('DELETE FROM comments WHERE id = '.$comment->getID());
	}

	public function setBDD($bdd)
	{
		$this->bdd = $bdd;
	}
}