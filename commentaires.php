<?php
class Commentaires
{

	private $id;
	private $pseudo;
	private $commentaire;
	private $datecommentaire;
	private $id_billet;
	private $signaler;

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

	public function setCommentaire($commentaire)
	{
		if(is_string($commentaire))
		{
			$this->commentaire = $commentaire;
		}
	}

	public function getCommentaire()
	{
		return $this->commentaire;
	}

	public function setDatecommentaire($datecommentaire)
	{
		$this->datecommentaire = $datecommentaire;
	}

	public function getDatecommentaire()
	{
		return $this->datecommentaire;
	}

	public function setId_billet($id_billet)
	{
		$id_billet = (int) $id_billet;

		if ($id_billet > 0) 
		{
			$this->id_billet = $id_billet;
		}
	}

	public function getId_billet()
	{
		return $this->id_billet;
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

}