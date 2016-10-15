<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Category;
use AppBundle\Entity\Product;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

class ProductRepository extends EntityRepository
{
	/**
	 * Our new getAllPosts() method
	 *
	 * 1. Create & pass query to paginate method
	 * 2. Paginate will return a `\Doctrine\ORM\Tools\Pagination\Paginator` object
	 * 3. Return that object to the controller
	 *
	 * @param integer $currentPage The current page (passed from controller)
	 *
	 * @return \Doctrine\ORM\Tools\Pagination\Paginator
	 */
	public function getAllProducts($currentPage = 1)
	{
	    $query = $this->createQueryBuilder('p')
	        ->orderBy('p.rank', 'DESC')
	        ->getQuery();

	    $paginator = $this->paginate($query, $currentPage);

	    return $paginator;
	}

	/**
	 * Paginator Helper
	 *
	 * Pass through a query object, current page & limit
	 * the offset is calculated from the page and limit
	 * returns an `Paginator` instance, which you can call the following on:
	 *
	 *     $paginator->getIterator()->count() # Total fetched (ie: `5` posts)
	 *     $paginator->count() # Count of ALL posts (ie: `20` posts)
	 *     $paginator->getIterator() # ArrayIterator
	 *
	 * @param Doctrine\ORM\Query $dql   DQL Query Object
	 * @param integer            $page  Current page (defaults to 1)
	 * @param integer            $limit The total number per page (defaults to 5)
	 *
	 * @return \Doctrine\ORM\Tools\Pagination\Paginator
	 */
	public function paginate($dql, $page = 1, $limit = 5)
	{
	    $paginator = new Paginator($dql);

	    $paginator->getQuery()
	        ->setFirstResult($limit * ($page - 1)) // Offset
	        ->setMaxResults($limit); // Limit

	    return $paginator;
	}

	/**
	 * @param Category $category
	 * @return Product[]
	 */
	public function findByCategory(Category $category, $currentPage = 1)
	{
		$query =  $this->_em->createQuery('SELECT p
			FROM AppBundle\Entity\Product p
			JOIN AppBundle\Entity\ProductCategory pc WITH p = pc.product
			JOIN AppBundle\Entity\Category c WITH pc.category = c
			WHERE c.left >= :lft and c.right <= :rgt
			GROUP BY p
		')
			->setParameter("lft", $category->getLeft())
			->setParameter("rgt", $category->getRight());

	    $paginator = $this->paginate($query, $currentPage);

	    return $paginator;		
	}

}
