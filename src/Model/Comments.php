<?php

namespace Blog\MODEL;

class Comments
{

	private $id;
	private $pseudo;
	private $comment;
	private $datecomment;
	private $id_post;
	private $report;
	private $datereport;

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

	public function setComment($comment)
	{
		if(is_string($comment))
		{
			$this->comment = $comment;
		}
	}

	public function getComment()
	{
		return $this->comment;
	}

	public function setDatecomment($datecomment)
	{
		$this->datecomment = $datecomment;
	}

	public function getDatecomment()
	{
		return $this->datecomment;
	}

	public function setId_post($id_post)
	{
		$id_post = (int) $id_post;

		if ($id_post > 0) 
		{
			$this->id_post = $id_post;
		}
	}

	public function getId_post()
	{
		return $this->id_post;
	}

	public function setReport($report)
	{
		$report = (int) $report;

		if ($report > 0)
		{
			$this->report = $report;
		}
	}

	public function getReport()
	{
		return $this->report;
	}
	
	public function setDatereport($datereport)
	{
			$this->datereport = $datereport;
		
	}

	public function getDatereport()
	{
		return $this->datereport;
	}

}