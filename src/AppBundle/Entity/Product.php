<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @author Jan Klat <jenik@klatys.cz>
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProductRepository")
 * @ORM\Table(name="products")
 */
class Product
{

	/**
	 * @var int
	 * @ORM\Id
	 * @ORM\GeneratedValue
	 * @ORM\Column(type="integer", name="product_id")
	 */
	private $id;

	/**
	 * @var string
	 * @ORM\Column(type="string")
	 */
	private $title;

	/**
	 * @var string
	 * @ORM\Column(type="string")
	 */
	private $image;

	/**
	 * @var string
	 * @ORM\Column(type="string")
	 */
	private $slug;

	/**
	 * @var string
	 * @ORM\Column(type="string")
	 */
	private $description;

	/**
	 * @var float
	 * @ORM\Column(type="float")
	 */
	private $price;

	/**
	 * var int
	 * @ORM\Column(type="integer")
	 */
	private $rank;

	/**
	 * @var Category[]
	 * @ORM\ManyToMany(targetEntity="Category", inversedBy="products")
	 * @ORM\JoinTable(name="categories")
	 */
	private $categories;

	/**
	 * Product constructor.
	 */
	public function __construct()
	{
		$this->categories = new ArrayCollection();
	}

	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param int $id
	 * @return self
	 */
	public function setId($id)
	{
		$this->id = $id;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * @param string $title
	 * @return self
	 */
	public function setTitle($title)
	{
		$this->title = $title;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getImage()
	{
		return $this->image;
	}

	/**
	 * @param string $image
	 * @return self
	 */
	public function setImage($image)
	{
		$this->image = $image;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getSlug()
	{
		return $this->slug;
	}

	/**
	 * @param string $slug
	 * @return self
	 */
	public function setSlug($slug)
	{
		$this->slug = $slug;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * @param string $description
	 * @return self
	 */
	public function setDescription($description)
	{
		$this->description = $description;
		return $this;
	}

	/**
	 * @return float
	 */
	public function getPrice()
	{
		return $this->price;
	}

	/**
	 * @param float $price
	 * @return self
	 */
	public function setPrice($price)
	{
		$this->price = $price;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getRank()
	{
		return $this->rank;
	}

	/**
	 * @param mixed $rank
	 * @return self
	 */
	public function setRank($rank)
	{
		$this->rank = $rank;
		return $this;
	}

	/**
	 * @return Category[]
	 */
	public function getCategories()
	{
		return $this->categories;
	}

	/**
	 * @param Category[] $categories
	 * @return self
	 */
	public function setCategories($categories)
	{
		$this->categories = $categories;
		return $this;
	}

}
