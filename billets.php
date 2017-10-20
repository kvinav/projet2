<?php

class Billets
{

	private $id;
	private $auteur;
	private $titre;
	private $billet;
	private $datebillet;

	public function __construct($value = [])
	{
		if (!empty($value))
		{

			$this->hydrate($value);
		}
	}

	public function hydrate(array $donnees)
	{
		foreach ($donnees as $key => $value)
		{
			$method = 'set'.ucfirst($key);
		}
		if (method_exists($this, $method)) 
		{
			$this->$method($value);
		}
	}
	//récupération id
	public function setId($id)
	{
		

		$id = (int) $id;

			if ($id > 0)
			{

				$this->id = $id;

			}
	}

	public function getId($id)
	{
		return $this->id;

	}
	

	//récupération auteur
	public function setAuteur($auteur)
	{
		
		if (is_string($auteur))
		{
		$this->auteur = $auteur;
		}

	}

	public function getAuteur($auteur)
	{
		return $this->auteur;

	}

	//récupération titre
	public function setTitre($titre)
	{
		
		if (is_string($titre))
		{
		$this->titre = $titre;
		}

	}

	public function getTitre($titre)
	{
		return $this->titre;

	}


	//récupérer billet
	public function setBillet($billet)
	{
		if (is_string($billet))
		{
		$this->billet = $billet;
		}
	}

	public function getBillet($billet)
	{
		return $this->billet;

	}
//récupération date_billet
	public function setDatebillet($datebillet)
	{
		
		$this->datebillet = $datebillet;
		
	}

	public function getDatebillet($datebillet)
	{
		return $this->datebillet;

	}

}
