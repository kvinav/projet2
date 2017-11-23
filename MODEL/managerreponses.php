<?php
class ManagerReponses
{
	private $bdd;

	public function __construct($bdd)
	{
		$this->setBDD($bdd);
	}

	public function add(Reponses $reponse)
	{
		$req = $this->bdd->prepare('INSERT INTO reponses (pseudo, reponse, id_commentaire, datereponse) VALUES(:pseudo, :reponse, :id_commentaire, NOW())');

		$req->bindValue(':pseudo', $reponse->getPseudo(), PDO::PARAM_STR);
		$req->bindValue(':reponse', $reponse->getReponse(), PDO::PARAM_STR);
		$req->bindValue(':id_commentaire', $reponse->getId_commentaire(), PDO::PARAM_INT);
		$req->execute();

	}

	public function get($id)
	{
		$req = $this->bdd->query('SELECT pseudo, reponse, DATE_FORMAT(datereponse, \'%d/%m/%Y à %Hh%imin\') AS datereponse, signaler FROM reponses ORDER BY id');
		$donnees = $req->fetch(PDO::FETCH_ASSOC);

		$req->execute();
	}

	public function signaler(Reponses $reponse)
	{
		$req = $this->bdd->prepare('UPDATE reponses SET signaler = :signaler WHERE id = :id');
		$req->bindvalue(':signaler', $reponse->getSignaler() + 1, PDO::PARAM_INT);
		$req->bindValue(':id', $reponse->getId(), PDO::PARAM_INT);

		$req->execute();

	}

	public function supprimersignalement(Reponses $reponse)
	{
		$req = $this->bdd->prepare('UPDATE reponses SET signaler = :signaler, datesignaler = NULL WHERE id = :id');
		$req->bindvalue(':signaler', 0, PDO::PARAM_INT);
		$req->bindValue(':id', $reponse->getId(), PDO::PARAM_INT);

		$req->execute();

	}

	public function getListadmin()
	{
		$reponsesadmin = [];

		$req = $this->bdd->prepare('SELECT id, pseudo, reponse, DATE_FORMAT(datereponse, \'%d/%m/%Y à %Hh%imin\') AS datereponse, signaler FROM reponses WHERE id_commentaire = :id_commentaire ORDER BY signaler DESC, id DESC');
			$req->bindValue(':id_commentaire', $_GET['id']);
     	$req->execute();

		while ($donnees = $req->fetch(PDO::FETCH_ASSOC))
		{
			$reponsesadmin[] = new Reponses($donnees);
		}

		return $reponsesadmin;
	}

	public function getList()
	{
		$reponses = [];

		$req = $this->bdd->prepare('SELECT id, pseudo, reponse, DATE_FORMAT(datereponse, \'%d/%m/%Y à %Hh%imin\') AS datereponse, signaler FROM reponses WHERE id_commentaire = :id_commentaire ORDER BY id');
		$req->bindValue(':id_commentaire', $_GET['id']);
     	$req->execute();

		while ($donnees = $req->fetch(PDO::FETCH_ASSOC))
		{
			$reponses[] = new Reponses($donnees);
		}

		return $reponses;
	}

	public function getListtotal()
	{
		$reponsestotal = [];

		$req = $this->bdd->prepare('SELECT id, pseudo, reponse, DATE_FORMAT(datereponse, \'%d/%m/%Y à %Hh%imin\') AS datereponse, signaler, id_commentaire FROM reponses ORDER BY signaler DESC, id DESC');
     	$req->execute();

		while ($donnees = $req->fetch(PDO::FETCH_ASSOC))
		{
			$reponsestotal[] = new Reponses($donnees);
		}

		return $reponsestotal;
	}

	public function getListsignales()
	{
		$reponsestotalsignales = [];

		$req = $this->bdd->prepare('SELECT id, pseudo, reponse, signaler, id_billet, datesignaler, DATE_FORMAT(datereponse, "%d/%m/%Y à %Hh%imin") AS datereponse FROM reponses ORDER BY datesignaler DESC LIMIT 0,5');
     	$req->execute();

		while ($donnees = $req->fetch(PDO::FETCH_ASSOC))
		{
			$reponsestotalsignales[] = new Reponses($donnees);
		}

		return $reponsestotalsignales;
	}

	public function getUnique()
    {
       
      $req = $this->bdd->prepare('SELECT id, pseudo, reponse, DATE_FORMAT(datereponse, \'%d/%m/%Y à %Hh%imin\') AS datereponse, signaler, id_commentaire FROM reponses WHERE id = :id');
      $req->bindValue(':id', $_GET['idrep']);
      $req->execute();
      $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Reponses');
      $reponseunique = $req->fetch();
      return $reponseunique;

    }

	public function update(Reponses $reponse)
	{
		$req = $this->bdd->prepare('UPDATE reponses SET pseudo = :pseudo, reponse = :reponse WHERE id= :id');

		$req->bindValue(':pseudo', $reponse->getPseudo(), PDO::PARAM_INT);
		$req->bindValue(':reponse', $reponse->getReponse(), PDO::PARAM_INT);

		$req->execute();
	}

	public function delete(Reponses $reponse)
	{
		$this->bdd->exec('DELETE FROM reponses WHERE id = '.$reponse->getID());
	}

	public function setBDD(PDO $bdd)
	{
		$this->bdd = $bdd;
	}
}