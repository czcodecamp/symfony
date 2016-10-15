<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Category;
use AppBundle\Entity\Product;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;
use Doctrine\ORM\Tools\Pagination\Paginator;

class ProductRepository extends EntityRepository
{

	const PRODUCTS_PER_PAGE = 21;

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
	 * @param int $page
	 * @param int $limit
	 * @return Paginator
	 */
	public function findAllProducts($page = 1, $limit = self::PRODUCTS_PER_PAGE)
	{
		/** @var Query $query */
		$query = $this->_em->createQuery('SELECT p
			FROM AppBundle\Entity\Product p
		  	ORDER BY p.rank DESC 
		');
		return $this->paginate($query, $page, $limit);
	}

	/**
	 * @param Category $category
	 * @param int $page
	 * @param int $limit
	 * @return Paginator
	 */
	public function findByCategory(Category $category, $page = 1, $limit = self::PRODUCTS_PER_PAGE)
	{
		/** @var Query $query */
		$query = $this->_em->createQuery('SELECT p
			FROM AppBundle\Entity\Product p
			JOIN AppBundle\Entity\ProductCategory pc WITH p = pc.product
			JOIN AppBundle\Entity\Category c WITH pc.category = c
			WHERE c.left >= :lft and c.right <= :rgt
			GROUP BY p
		')
			->setParameter("lft", $category->getLeft())
			->setParameter("rgt", $category->getRight());
		return $this->paginate($query, $page, $limit);
	}

	/**
	 * @param Query $query
	 * @param int $page
	 * @param int $limit
	 * @return Paginator
	 */
	public function paginate($query, $page = 1, $limit = self::PRODUCTS_PER_PAGE)
	{
		$paginator = new Paginator($query, false);
		$paginator
			->getQuery()
			->setFirstResult($limit * ($page - 1)) // Offset
			->setMaxResults($limit); // Limit
		return $paginator;
	}

}
