<?php
class Reponses
{

	private $id;
	private $pseudo;
	private $datereponse;
	private $reponse;
	private $id_commentaire;
	private $signaler;
	private $datesignaler;

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
		
			if (method_exists($this, $method)) 
			{
			$this->$method($value);
			}
		}
	}

	public function setID($id)
	{

		$id = (int) $id;

			if ($id > 0)
			{
				$this->id = $id;
			}

	}

	public function getID()
	{
		return $this->id;
	}

	public function setPseudo($pseudo)
	{
		if (is_string($pseudo))
		{
			$this->pseudo = $pseudo;
		}
	}

	public function getPseudo()
	{
		return $this->pseudo;
	}

	public function setReponse($reponse)
	{
		if(is_string($reponse))
		{
			$this->reponse = $reponse;
		}
	}

	public function getReponse()
	{
		return $this->reponse;
	}

	public function setDatereponse($datereponse)
	{
		$this->datereponse = $datereponse;
	}

	public function getDatereponse()
	{
		return $this->datereponse;
	}

	public function setId_commentaire($id_commentaire)
	{
		$id_commentaire = (int) $id_commentaire;

		if ($id_commentaire > 0) 
		{
			$this->id_commentaire = $id_commentaire;
		}
	}

	public function getId_commentaire()
	{
		return $this->id_commentaire;
	}

	public function setSignaler($signaler)
	{
		$signaler = (int) $signaler;

		if ($signaler > 0)
		{
			$this->signaler = $signaler;
		}
	}

	public function getSignaler()
	{
		return $this->signaler;
	}
	
	public function setDatesignaler($datesignaler)
	{
			$this->datesignaler = $datesignaler;
		
	}

	public function getDatesignaler()
	{
		return $this->datesignaler;
	}


}