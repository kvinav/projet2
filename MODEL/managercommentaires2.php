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
		$req = $this->bdd->prepare('INSERT INTO commentaires (pseudo, commentaire, id_billet, datecommentaire) VALUES(:pseudo, :commentaire, :id_billet, NOW())');

		$req->bindValue(':pseudo', $commentaire->getPseudo(), PDO::PARAM_STR);
		$req->bindValue(':commentaire', $commentaire->getCommentaire(), PDO::PARAM_STR);
		$req->bindValue(':id_billet', $commentaire->getId_billet(), PDO::PARAM_INT);
		$req->execute();

	}

	public function get($id)
	{
		$req = $this->bdd->query('SELECT pseudo, commentaire, signaler, datecommentaire FROM commentaires ORDER BY id');
		$donnees = $req->fetch(PDO::FETCH_ASSOC);

		$req->execute();
	}

	public function signaler(Commentaires $commentaire)
	{
		$req = $this->bdd->prepare('UPDATE commentaires SET signaler = :signaler WHERE id = :id');
		$req->bindvalue(':signaler', $commentaire->getSignaler() + 1, PDO::PARAM_INT);
		$req->bindValue(':id', $commentaire->getId(), PDO::PARAM_INT);

		$req->execute();

	}

	public function getListadmin()
	{
		$commentairesadmin = [];

		$req = $this->bdd->prepare('SELECT id, pseudo, commentaire, signaler, datecommentaire FROM commentaires WHERE id_billet = :id_billet ORDER BY signaler DESC, id DESC');
			$req->bindValue(':id_billet', $_GET['id']);
     	$req->execute();

		while ($donnees = $req->fetch(PDO::FETCH_ASSOC))
		{
			$commentairesadmin[] = new Commentaires($donnees);
		}

		return $commentairesadmin;
	}

	public function getList()
	{
		$commentaires = [];

		$req = $this->bdd->prepare('SELECT id, pseudo, commentaire, signaler, datecommentaire FROM commentaires WHERE id_billet = :id_billet ORDER BY id');
		$req->bindValue(':id_billet', $_GET['id']);
     	$req->execute();

		while ($donnees = $req->fetch(PDO::FETCH_ASSOC))
		{
			$commentaires[] = new Commentaires($donnees);
		}

		return $commentaires;
	}

	public function getListtotal()
	{
		$commentairestotal = [];

		$req = $this->bdd->prepare('SELECT id, pseudo, commentaire, signaler, id_billet, datecommentaire FROM commentaires ORDER BY signaler DESC, id DESC');
     	$req->execute();

		while ($donnees = $req->fetch(PDO::FETCH_ASSOC))
		{
			$commentairestotal[] = new Commentaires($donnees);
		}

		return $commentairestotal;
	}
	public function getUnique()
    {
       
      $req = $this->bdd->prepare('SELECT id, pseudo, commentaire, signaler, id_billet, datecommentaire FROM commentaires WHERE id = :id');
      $req->bindValue(':id', $_GET['id']);
      $req->execute();
      $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Commentaires');
      $commentaireunique = $req->fetch();
      return $commentaireunique;

    }

	public function update(Commentaires $commentaire)
	{
		$req = $this->bdd->prepare('UPDATE commentaires SET pseudo = :pseudo, commentaire = :commentaire WHERE id= :id');

		$req->bindValue(':pseudo', $commentaire->getPSeudo(), PDO::PARAM_INT);
		$req->bindValue(':commentaire', $commentaire->getCommentaire(), PDO::PARAM_INT);

		$req->execute();
	}

	public function delete(Commentaires $commentaire)
	{
		$this->bdd->exec('DELETE FROM commentaires WHERE id = '.$commentaire->getID());
	}

	public function setBDD(PDO $bdd)
	{
		$this->bdd = $bdd;
	}
}