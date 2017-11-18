<?php

class ManagerBillets
{
	private $bdd;

	public function __construct($bdd)
  {
    $this->setBdd($bdd);
  }

	//Ajouter billet

	public function add(Billets $billets)
	{

		$req = $this->bdd->prepare('INSERT INTO billets (auteur, titre, billet, datebillet) VALUES(\'Jean Forteroche\', :titre, :billet, NOW())');

		$req->bindValue(':titre', $billets->getTitre(), PDO::PARAM_STR);
		$req->bindValue(':billet', $billets->getBillet(), PDO::PARAM_STR);
		$req->execute();

	}

	public function get($id)
    {
   		$req = $this->bdd->query('SELECT id, auteur, titre, billet, DATE_FORMAT(datebillet, \'%d/%m/%Y %Hh%imin\') AS datebillet FROM billets ORDER BY id DESC');
   		$donnees = $req->fetch(PDO::FETCH_ASSOC);

   		 //Execution requète
    	$req->execute();
    }

    //récupérer liste billets
  	public function getList()
  	{
     	$billets = [];

    	$req = $this->bdd->query('SELECT id, auteur, titre, billet, DATE_FORMAT(datebillet, \'%d/%m/%Y à %Hh%imin\') AS datebillet, DATE_FORMAT(datemodif, \'%d/%m/%Y à %Hh%imin\') AS datemodif FROM billets ORDER BY id DESC');

    		while ($donnees = $req->fetch(PDO::FETCH_ASSOC))
    		{
     			 $billets[] = new Billets($donnees);
    		}

    	return $billets;
  	}

      // récupération billet unique
    public function getUnique()
    {
       
      $req = $this->bdd->prepare('SELECT id, auteur, titre, billet, DATE_FORMAT(datebillet, \'%d/%m/%Y à %Hh%imin\') AS datebillet, DATE_FORMAT(datemodif, \'%d/%m/%Y à %Hh%imin\') AS datemodif FROM billets WHERE id = :id');
      $req->bindValue(':id', $_GET['id']);
      $req->execute();
      $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Billets');
      $billetunique = $req->fetch();
      return $billetunique;

    }
   	//Update billet

  	 public function update(Billets $billets)
    {
        $req = $this->bdd->prepare('UPDATE billets SET titre = :titre, billet = :billet, datemodif = NOW() WHERE id = '.$billets->getId());
  
        $req->bindValue(':titre', $billets->getTitre(), PDO::PARAM_STR);
        $req->bindValue(':billet', $billets->getBillet(), PDO::PARAM_STR);
  
        $req->execute();
    }

    //Suppression d'un billet

  	 public function delete(Billets $billet)
    {
        $this->bdd->exec('DELETE FROM billets WHERE id = '.$billet->getId());
    }
 
 
  	public function setBdd(PDO $bdd)
  	{
   		 $this->bdd = $bdd;
  	}

}