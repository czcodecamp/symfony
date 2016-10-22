<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @author Vašek Boch <vasek.boch@live.com>
 * @author Jan Klat <jenik@klatys.cz>
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProductCategoryRepository")
 * @ORM\Table(name="product_category")
 */
class ProductCategory
{

	/**
	 * @var int
	 * @ORM\Id
	 * @ORM\GeneratedValue
	 * @ORM\Column(type="integer")
	 */
	private $id;

	/**
	 * @var Product
	 * @ORM\ManyToOne(targetEntity="Product")
	 */
	private $product;

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
	 * @return Product
	 */
	public function getProduct() {
		return $this->product;
	}

	/**
	 * @param Product $product
	 */
	public function setProduct(Product $product) {
		$this->product = $product;
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