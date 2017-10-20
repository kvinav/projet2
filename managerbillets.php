<?php

class ManagerBillets
{
	private $bdd;

	public function __construct($bdd)
	{
		$this->setBdd($bdd);
	}


	public function add(Billets $billets)
	{

		$req = $this->bdd->prepare('INSERT INTO billets (auteur, titre, billet, datebillet) VALUES(:auteur, :titre, :billet, NOW())');

		$req->bindValue(':auteur', $billets->getAuteur(''), PDO::PARAM_INT);
		$req->bindValue(':titre', $billets->getTitre(''), PDO::PARAM_INT);
		$req->bindValue(':billet', $billets->getBillet(''), PDO::PARAM_INT);
		$req->execute();

	}

	public function get($id)
    {
   		$req = $this->bdd->query('SELECT auteur, titre, billet, datebillet FROM billets ORDER BY ID DESC');
   		$donnees = $req->fetch(PDO::FETCH_ASSOC);

   		 //Execution requète
    	$req->execute();
    }

  	public function getList()
  	{
     	$billets = [];

    	$req = $this->bdd->query('SELECT auteur, titre, billet, datebillet FROM billets ORDER BY ID DESC');

    		while ($donnees = $req->fetch(PDO::FETCH_ASSOC))
    		{
     			 $billets[] = new Billets($donnees);
    		}

    	return $billets;
  	}

 
  	public function setBdd(PDO $bdd)
  	{
   		 $this->bdd = $bdd;
  	}

}