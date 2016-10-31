<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Category;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

/**
 * @author Tomáš Linhart <lin.tomeus@gmail.com>
 */
class FaqRepository extends EntityRepository
{

	/**
	 * @param Category $category
	 * @return QueryBuilder
	 */
	public function findByCategory(Category $category)
	{
		$builder = $this->_em->createQueryBuilder()
			->select('f')
			->from('AppBundle\Entity\Faq', 'f')
			->join('AppBundle\Entity\FaqCategory', 'fc', 'WITH', 'f = fc.faq')
			->join('AppBundle\Entity\Category', 'c', 'WITH', 'fc.category = c')
			->where('c.left >= :lft and c.right <= :rgt')
			->setParameter("lft", $category->getLeft())
			->setParameter("rgt", $category->getRight());
		return $builder;
	}

	/**
	 * @param int $limit
	 * @return array
	 */
	public function findTop($limit)
	{
		return $this->findBy(
			[
			],
			[
				"rank" => "desc"
			],
			$limit
		);
	}

}
