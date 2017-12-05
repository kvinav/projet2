<?php

namespace Blog\MODEL;


class Posts
{

	private $id;
	private $author;
	private $title;
	private $post;
	private $datepost;
	private $datemodif;

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
	//récupération id
	public function setId($id)
	{
		

		$id = (int) $id;

			if ($id > 0)
			{

				$this->id = $id;

			}
	}

	public function getId()
	{
		return $this->id;

	}
	


	public function setAuthor($author)
	{
		
		if (is_string($author))
		{
		$this->author = $author;
		}

	}

	public function getAuthor()
	{	
		return $this->author;

	}


	public function setTitle($title)
	{
		
		if (is_string($title))
		{
		$this->title = $title;
		}

	}

	public function getTitle()
	{
		return $this->title;

	}


	
	public function setPost($post)
	{
		if (is_string($post))
		{
		$this->post = $post;
		}
	}

	public function getPost()
	{
		return $this->post;

	}

	public function setDatepost($datepost)
	{
		
		$this->datepost = $datepost;
		
	}

	public function getDatepost()
	{
		return $this->datepost;

	}

    public function setDatemodif($datemodif)
	{
		
		$this->datemodif = $datemodif;
		
	}

	public function getDatemodif()
	{
		return $this->datemodif;

	}
}
