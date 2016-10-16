<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Category;
use AppBundle\Entity\Product;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

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
			JOIN AppBundle\Entity\ProductCategory pc WITH p = pc.product
			JOIN AppBundle\Entity\Category c WITH pc.category = c
			WHERE c.left >= :lft and c.right <= :rgt
			GROUP BY p
		')
			->setParameter("lft", $category->getLeft())
			->setParameter("rgt", $category->getRight())
			->getResult();
	}
        
        /**
	 * @param Category $category
	 * @return Product[]
	 */
	public function findByCategoryAndLimit(Category $category, $length, $offset)
	{
		return $query =  $this->_em->createQuery('SELECT p
			FROM AppBundle\Entity\Product p
			JOIN AppBundle\Entity\ProductCategory pc WITH p = pc.product
			JOIN AppBundle\Entity\Category c WITH pc.category = c
			WHERE c.left >= :lft and c.right <= :rgt
			GROUP BY p
		')
			->setParameter("lft", $category->getLeft())
			->setParameter("rgt", $category->getRight())
                        ->setFirstResult($offset)
                        ->setMaxResults($length)
			->getResult();
                return $paginator = new Paginator($query, $fetchJoinCollection = true);
	}
        
        public function countAll() {
            $query = $this->_em->createQuery('SELECT COUNT(p.id) FROM AppBundle\Entity\Product p');
            return $count = $query->getSingleScalarResult();
        }
        
        public function countByCategory(Category $category) {
            $query = $this->_em->createQuery('SELECT COUNT(p.id)
			FROM AppBundle\Entity\Product p
			LEFT JOIN AppBundle\Entity\ProductCategory pc WITH p = pc.product
			LEFT JOIN AppBundle\Entity\Category c WITH pc.category = c
			WHERE c.left >= :lft and c.right <= :rgt

		')
			->setParameter("lft", $category->getLeft())
			->setParameter("rgt", $category->getRight());  
            dump($query->getScalarResult());
            return $count = $query->getSingleScalarResult();
        }
}
