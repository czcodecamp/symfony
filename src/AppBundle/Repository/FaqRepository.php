<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Faq;
use Doctrine\ORM\EntityRepository;

/**
 * @author Vašek Boch <vasek.boch@live.com>
 * @author Jan Klat <jenik@klatys.cz>
 */
class FaqRepository extends EntityRepository
{
	/**
	 * @param Faq $faq
	 * @return QueryBuilder
	 */
	public function findByFaq(Faq $faq)
	{
		$builder = $this->_em->createQueryBuilder()
			->select('f')
			->from('AppBundle\Entity\Faq', 'f');
		return $builder;
	}

	public function countAll() {
		return $this->_em->createQueryBuilder()
			->select('COUNT(f.id)')
			->from('AppBundle\Entity\Faq', 'f')
			->getQuery()->getSingleScalarResult();
	}
}
