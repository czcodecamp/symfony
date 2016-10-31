<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @author Tomáš Linhart <lin.tomeus@gmail.com>
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FaqCategoryRepository")
 * @ORM\Table(name="faq_category")
 */
class FaqCategory
{

	/**
	 * @var int
	 * @ORM\Id
	 * @ORM\GeneratedValue
	 * @ORM\Column(type="integer")
	 */
	private $id;

	/**
	 * @var Faq
	 * @ORM\ManyToOne(targetEntity="Faq")
	 */
	private $faq;

	/**
	 * @var Category
	 * @ORM\ManyToOne(targetEntity="Category")
	 */
	private $category;

	/**
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return Faq
	 */
	public function getFaq()
	{
		return $this->faq;
	}

	/**
	 * @param Faq $faq
	 * @return self
	 */
	public function setFaq(Faq $faq)
	{
		$this->faq = $faq;
		return $this;
	}

	/**
	 * @return Category
	 */
	public function getCategory() {
		return $this->category;
	}

	/**
	 * @param Category $category
	 */
	public function setCategory(Category $category) {
		$this->category = $category;
	}

}
