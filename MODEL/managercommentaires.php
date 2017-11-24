<?php
class ManagerCommentaires
{
	private $bdd;

	public function __construct($bdd)
	{
		$this->setBDD($bdd);
	}

	public function add(Commentaires $commentaire)
	{
		$req = $this->bdd->qery('INSERT INTO commentaires (pseudo, commentaire, id_billet, datecommentaire) VALUES(?, ?, ?, NOW())',
		                        [$commentaire->getPseudo(), $commentaire->getCommentaire(), $commentaire->getId_billet()]);


	}

	public function get($id)
	{
		$req = $this->bdd->query('SELECT pseudo, commentaire, signaler, DATE_FORMAT(datecommentaire, "%d/%m/%Y à %Hh%imin") AS datecommentaire FROM commentaires ORDER BY id');
		$donnees = $req->fetch(PDO::FETCH_ASSOC);

		$req->execute();
	}

	public function signaler(Commentaires $commentaire)
	{
		$req = $this->bdd->query('UPDATE commentaires SET signaler = ?, datesignaler = NOW() WHERE id = ?', 
		                        [$commentaire->getSignaler() + 1, $commentaire->getId()]
		                        );

	}
	public function supprimersignalement(Commentaires $commentaire)
	{
		$req = $this->bdd->query('UPDATE commentaires SET signaler = ?, datesignaler = NULL WHERE id = ?',
		                        [0, $commentaire->getId()]
		                        );
		

	}

	public function getListadmin()
	{
		$commentairesadmin = [];

		$req = $this->bdd->query('SELECT id, pseudo, commentaire, signaler, DATE_FORMAT(datecommentaire, "%d/%m/%Y à %Hh%imin") AS datecommentaire FROM commentaires                     WHERE id_billet = ? ORDER BY signaler DESC, id DESC',
		                        [$_GET['id']]
		                        );


		while ($donnees = $req->fetch(PDO::FETCH_ASSOC))
		{
			$commentairesadmin[] = new Commentaires($donnees);
		}

		return $commentairesadmin;
	}

	public function getList()
	{
		$commentaires = [];

		$req = $this->bdd->query('SELECT id, pseudo, commentaire, signaler, DATE_FORMAT(datecommentaire, "%d/%m/%Y à %Hh%imin") AS datecommentaire FROM commentaires                      WHERE id_billet = ? ORDER BY id',
		                        [$_GET['id']]
		                        );
	
		while ($donnees = $req->fetch(PDO::FETCH_ASSOC))
		{
			$commentaires[] = new Commentaires($donnees);
		}

		return $commentaires;
	}

	public function getListtotal()
	{
		$commentairestotal = [];

		$req = $this->bdd->query('SELECT id, pseudo, commentaire, signaler, id_billet, DATE_FORMAT(datecommentaire, "%d/%m/%Y à %Hh%imin") AS datecommentaire FROM commentaires ORDER BY id_billet DESC, signaler DESC');
     

		while ($donnees = $req->fetch(PDO::FETCH_ASSOC))
		{
			$commentairestotal[] = new Commentaires($donnees);
		}

		return $commentairestotal;
	}
	
	public function getListsignales()
	{
		$commentairestotalsignales = [];

		$req = $this->bdd->query('SELECT id, pseudo, commentaire, signaler, id_billet, datesignaler, DATE_FORMAT(datecommentaire, "%d/%m/%Y à %Hh%imin") AS datecommentaire FROM commentaires ORDER BY datesignaler DESC LIMIT 0,5');
     

		while ($donnees = $req->fetch(PDO::FETCH_ASSOC))
		{
			$commentairestotalsignales[] = new Commentaires($donnees);
		}

		return $commentairestotalsignales;
	}
	public function getUnique($id)
    {
       
      $req = $this->bdd->query('SELECT id, pseudo, commentaire, signaler, id_billet, DATE_FORMAT(datecommentaire, "%d/%m/%Y à %Hh%imin") AS datecommentaire FROM                          commentaires WHERE id = ?',
                                [$id]
                                );
     
      $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Commentaires');
      $commentaireunique = $req->fetch();
      return $commentaireunique;

    }

	public function update(Commentaires $commentaire)
	{
		$req = $this->bdd->query('UPDATE commentaires SET pseudo = ?, commentaire = ? WHERE id= :id',
		                        [$commentaire->getPseudo(), $commentaire->getCommentaire()]
		                        );

	}

	public function delete(Commentaires $commentaire)
	{
		$this->bdd->exec('DELETE FROM commentaires WHERE id = '.$commentaire->getID());
	}

	public function setBDD($bdd)
	{
		$this->bdd = $bdd;
	}
}