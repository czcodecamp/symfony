<?php
namespace AppBundle\VO;

use AppBundle\Entity\Category;
use AppBundle\Entity\Product;

/**
 * @author Tomáš Linhart <lin.tomeus@gmail.com>
 */
class BreadcrumbVO
{

	/**
	 * @var Category[]
	 */
	protected $categories = [];

	/**
	 * @var Product
	 */
	protected $product;

	/**
	 * BreadcrumbVO constructor.
	 * @param Category[] $categories
	 * @param Product|null $product
	 */
	private function __construct(array $categories, Product $product = null)
	{

		$this->categories = $categories;
		$this->product = $product;
	}

	/**
	 * @param array $categories
	 * @param Product|null $product
	 * @return BreadcrumbVO
	 */
	public static function create(array $categories, Product $product = null)
	{
		return new self($categories, $product);
	}

	/**
	 * @return Category[]
	 */
	public function getCategories()
	{
		return $this->categories;
	}

	/**
	 * @return bool
	 */
	public function isProduct()
	{
		return !is_null($this->product);
	}

	/**
	 * @return Product
	 */
	public function getProduct()
	{
		return $this->product;
	}

}
