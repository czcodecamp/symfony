<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Answer;
use AppBundle\Entity\Question;
use Doctrine\ORM\EntityRepository;

class AnswerRepository extends EntityRepository
{
	public function findByQuestion(Question $question)
	{
		return $this->_em->createQueryBuilder()
			->select('*')
			->from(Answer::class, 'a')
			->where('a.question = :question')
			->setParameter("question", $question)
			->getQuery()
			->getResult();
	}
}