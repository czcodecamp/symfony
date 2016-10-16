<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Category;
use AppBundle\Entity\Product;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Tools\Pagination\Paginator;

class ProductRepository extends EntityRepository
{

	/**
	 * @param Category $category
	 * @return QueryBuilder
	 */
	public function findByCategory(Category $category)
	{
		$builder = $this->_em->createQueryBuilder()
			->select('p')
			->from('AppBundle\Entity\Product', 'p')
			->join('AppBundle\Entity\ProductCategory', 'pc', 'WITH', 'p = pc.product')
			->join('AppBundle\Entity\Category', 'c', 'WITH', 'pc.category = c')
			->where('c.left >= :lft and c.right <= :rgt')
			->setParameter("lft", $category->getLeft())
			->setParameter("rgt", $category->getRight());
		return $builder;
	}

	public function countAll() {
		return $this->_em->createQueryBuilder()
			->select('COUNT(p.id)')
			->from('AppBundle\Entity\Product', 'p')
			->getQuery()->getSingleScalarResult();
	}

}
