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
		$req = $this->bdd->query('INSERT INTO reponses (pseudo, reponse, id_commentaire, datereponse) VALUES(?, ?, ?, NOW())',
		                        [$reponse->getPseudo(), $reponse->getReponse(), $reponse->getId_commentaire()]
		                        );

	
	}

	public function get($id)
	{
		$req = $this->bdd->query('SELECT pseudo, reponse, DATE_FORMAT(datereponse, \'%d/%m/%Y à %Hh%imin\') AS datereponse, signaler FROM reponses ORDER BY id');
		$donnees = $req->fetch(PDO::FETCH_ASSOC);

		$req->execute();
	}

	public function signaler(Reponses $reponse)
	{
		$req = $this->bdd->query('UPDATE reponses SET signaler = ? WHERE id = ?',
		                        [$reponse->getSignaler() + 1, $reponse->getId()]
		                        );

	}

	public function supprimersignalement(Reponses $reponse)
	{
		$req = $this->bdd->query('UPDATE reponses SET signaler = ?, datesignaler = NULL WHERE id = ?',
		                        [0, $reponse->getId()]
		                        );
	

	}

	public function getListadmin()
	{
		$reponsesadmin = [];

		$req = $this->bdd->query('SELECT id, pseudo, reponse, DATE_FORMAT(datereponse, \'%d/%m/%Y à %Hh%imin\') AS datereponse, signaler FROM reponses WHERE                             id_commentaire = ? ORDER BY signaler DESC, id DESC',
		                        [$_GET['id']]
		                        );
		

		while ($donnees = $req->fetch(PDO::FETCH_ASSOC))
		{
			$reponsesadmin[] = new Reponses($donnees);
		}

		return $reponsesadmin;
	}

	public function getList()
	{
		$reponses = [];

		$req = $this->bdd->query('SELECT id, pseudo, reponse, DATE_FORMAT(datereponse, \'%d/%m/%Y à %Hh%imin\') AS datereponse, signaler FROM reponses WHERE                             id_commentaire = ? ORDER BY id', 
	                        	[$_GET['id']]
		                        );

		while ($donnees = $req->fetch(PDO::FETCH_ASSOC))
		{
			$reponses[] = new Reponses($donnees);
		}

		return $reponses;
	}

	public function getListtotal()
	{
		$reponsestotal = [];

		$req = $this->bdd->query('SELECT id, pseudo, reponse, DATE_FORMAT(datereponse, \'%d/%m/%Y à %Hh%imin\') AS datereponse, signaler, id_commentaire FROM reponses ORDER BY signaler DESC, id DESC');
     

		while ($donnees = $req->fetch(PDO::FETCH_ASSOC))
		{
			$reponsestotal[] = new Reponses($donnees);
		}

		return $reponsestotal;
	}

	public function getListsignales()
	{
		$reponsestotalsignales = [];

		$req = $this->bdd->query('SELECT id, pseudo, reponse, signaler, id_billet, datesignaler, DATE_FORMAT(datereponse, "%d/%m/%Y à %Hh%imin") AS datereponse FROM reponses ORDER BY datesignaler DESC LIMIT 0,5');
    

		while ($donnees = $req->fetch(PDO::FETCH_ASSOC))
		{
			$reponsestotalsignales[] = new Reponses($donnees);
		}

		return $reponsestotalsignales;
	}

	public function getUnique()
    {
       
      $req = $this->bdd->query('SELECT id, pseudo, reponse, DATE_FORMAT(datereponse, \'%d/%m/%Y à %Hh%imin\') AS datereponse, signaler, id_commentaire FROM reponses                      WHERE id = ?',
                                [$_GET['idrep']]
                                );
     
      $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Reponses');
      $reponseunique = $req->fetch();
      return $reponseunique;

    }

	public function update(Reponses $reponse)
	{
		$req = $this->bdd->query('UPDATE reponses SET pseudo = ?, reponse = ? WHERE id= :id',
		                        [$reponse->getPseudo(), $reponse->getReponse()]
		                        );

	}

	public function delete(Reponses $reponse)
	{
		$this->bdd->exec('DELETE FROM reponses WHERE id = '.$reponse->getID());
	}

	public function setBDD($bdd)
	{
		$this->bdd = $bdd;
	}
}