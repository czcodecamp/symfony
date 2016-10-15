<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ProductRepository
 *
 */
class ProductRepository extends EntityRepository
{

	public function getAllProducts()
	{
		$query = $this->createQueryBuilder('p')
			->orderBy('p.rank', 'DESC')
			->getQuery();

		return $query;
	}
}
