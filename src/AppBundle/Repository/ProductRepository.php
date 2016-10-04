<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ProductRepository
 *
 */
class ProductRepository extends EntityRepository
{
    public function findBySlug($slug)
    {
        return $this->findOneBy([
            "slug" => $slug,
        ]);
    }

    public function findByCategoryIdOrderedByRank($categoryId, $limit = 20)
    {
        return $this->findBy(
            [
                "categoryId" => $categoryId,
            ],
            [
                "rank" => "desc"
            ],
            $limit
        );
    }

    public function findOrderedByRank($limit = 20)
    {
        return $this->findBy(
            [],
            [
                "rank" => "desc"
            ],
            $limit
        );
    }
}
