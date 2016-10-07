<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Category;
use AppBundle\Entity\Product;
use Doctrine\ORM\EntityRepository;

class ProductRepository extends EntityRepository
{

	/**
	 * @param Category $category
	 * @return Product[]
	 */
	public function findByCategory(Category $category)
	{
		return $this->_em->createQuery('SELECT p
			FROM AppBundle\Entity\Product p
			JOIN p.categories c
			WHERE c.left >= :lft and c.right <= :rgt
		')->setParameter("lft", $category->getLeft())
			->setParameter("rgt", $category->getRight())
			->getResult();
	}

}
