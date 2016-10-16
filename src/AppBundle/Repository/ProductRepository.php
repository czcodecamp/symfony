<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Category;
use AppBundle\Entity\Product;
use Doctrine\ORM\EntityRepository;

class ProductRepository extends EntityRepository
{
    const PAGE_SIZE = 3;

    /**
     * @param Category $category
     * @param int $last
     * @return Product[]
     */
    public function findPrevByCategory(Category $category, $last = 0)
    {
        return $this->inverseResult($this->_em->createQuery('SELECT p
			FROM AppBundle\Entity\Product p
			JOIN AppBundle\Entity\ProductCategory pc WITH p = pc.product
			JOIN AppBundle\Entity\Category c WITH pc.category = c
			WHERE c.left >= :lft and c.right <= :rgt
			AND p.id <= :last
			GROUP BY p
			ORDER BY p.id DESC
		')
            ->setParameter("lft", $category->getLeft())
            ->setParameter("rgt", $category->getRight())
            ->setParameter("last", $last)
            ->setMaxResults(self::PAGE_SIZE + 1)
            ->getResult());
    }


    /**
     * @param array $entities
     * @return array
     */
    protected function inverseResult(array $entities)
    {
        $result = [];

        $max = count($entities) - 1;
        $min = 0;
        for ($i = $max; $i >= $min; $i--) {
            $result[] = $entities[$i];
        }

        return $result;
    }

    /**
     * @param Category $category
     * @param int $last
     * @return Product[]
     */
	public function findNextByCategory(Category $category, $last = 0)
	{
		return $this->_em->createQuery('SELECT p
			FROM AppBundle\Entity\Product p
			JOIN AppBundle\Entity\ProductCategory pc WITH p = pc.product
			JOIN AppBundle\Entity\Category c WITH pc.category = c
			WHERE c.left >= :lft and c.right <= :rgt
			AND p.id > :last
			GROUP BY p
			ORDER BY p.id ASC
		')
			->setParameter("lft", $category->getLeft())
			->setParameter("rgt", $category->getRight())
			->setParameter("last", $last)
            ->setMaxResults(self::PAGE_SIZE + 1)
            ->getResult();
	}

}
