<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Category;
use AppBundle\Entity\Product;
use Doctrine\ORM\EntityRepository;

class ProductRepository extends EntityRepository
{

	/**
	 * @param string $slug
	 * @return null|Product
	 */
	public function findOneBySlug($slug)
	{
		return $this->findOneBy(
			[
				"slug" => $slug
			]
		);
	}

	/**
	 * @return Product[]
	 */
	public function findAllProducts()
	{
		return $this->findBy(
			[],
			[
				"rank" => "desc"
			],
			21
		);
	}

	/**
	 * @param Category $category
	 * @return Product[]
	 */
	public function findByCategory(Category $category)
	{
		return $this->_em->createQuery('SELECT p
			FROM AppBundle\Entity\Product p
			JOIN AppBundle\Entity\ProductCategory pc WITH p = pc.product
			JOIN AppBundle\Entity\Category c WITH pc.category = c
			WHERE c.left >= :lft and c.right <= :rgt
			GROUP BY p
		')
			->setParameter("lft", $category->getLeft())
			->setParameter("rgt", $category->getRight())
			->getResult();
	}

}
