<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @author Vašek Boch <vasek.boch@live.com>
 * @author Jan Klat <jenik@klatys.cz>
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CategoryRepository")
 */
class Category
{

	/**
	 * @var int
	 * @ORM\Id
	 * @ORM\GeneratedValue
	 * @ORM\Column(type="integer")
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
	private $slug;

	/**
	 * @var int
	 * @ORM\Column(type="integer")
	 */
	private $rank;

	/**
	 * @var Category
	 * @ORM\ManyToOne(targetEntity="Category")
	 */
	private $parentCategory;

	/**
	 * @var Category
	 * @ORM\ManyToOne(targetEntity="Category")
	 */
	private $topCategory;

	/**
	 * @var int
	 * @ORM\Column(type="integer")
	 */
	private $left;

	/**
	 * @var int
	 * @ORM\Column(type="integer")
	 */
	private $right;

	/**
	 * @var int
	 * @ORM\Column(type="integer")
	 */
	private $level;

	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
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
	 * @return int
	 */
	public function getRank()
	{
		return $this->rank;
	}

	/**
	 * @param int $rank
	 * @return self
	 */
	public function setRank($rank)
	{
		$this->rank = $rank;
		return $this;
	}

	/**
	 * @return Category
	 */
	public function getParentCategory()
	{
		return $this->parentCategory;
	}

	/**
	 * @param Category $parentCategory
	 * @return self
	 */
	public function setParentCategory(Category $parentCategory)
	{
		$this->parentCategory = $parentCategory;
		return $this;
	}

	/**
	 * @return Category
	 */
	public function getTopCategory()
	{
		return $this->topCategory;
	}

	/**
	 * @param Category $topCategory
	 * @return self
	 */
	public function setTopCategory(Category $topCategory)
	{
		$this->topCategory = $topCategory;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getLeft()
	{
		return $this->left;
	}

	/**
	 * @param int $left
	 * @return self
	 */
	public function setLeft($left)
	{
		$this->left = $left;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getRight()
	{
		return $this->right;
	}

	/**
	 * @param int $right
	 * @return self
	 */
	public function setRight($right)
	{
		$this->right = $right;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getLevel()
	{
		return $this->level;
	}

	/**
	 * @param int $level
	 * @return self
	 */
	public function setLevel($level)
	{
		$this->level = $level;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getMenuTitle()
	{
		return str_repeat("-", $this->getLevel()) . " " . $this->getTitle();
	}

	/**
	 * @return bool
	 */
	public function isLowestLevel()
	{
		return ($this->getRight() - $this->getLeft()) === 1;
	}

}