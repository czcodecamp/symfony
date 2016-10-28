<?php

namespace AppBundle\Facade;

use AppBundle\Entity\Category;
use AppBundle\Entity\Question;
use AppBundle\Repository\FaqRepository;
use AppBundle\Repository\QuestionRepository;
use Doctrine\ORM\EntityManager;

/**
 * @author Tomáš Linhart <lin.tomeus@gmail.com>
 */
class HelpFacade {

	private $faqRepository;

	private $questionRepository;
	/**
	 * @var EntityManager
	 */
	private $entityManager;

	public function __construct(
		EntityManager $entityManager,
		FaqRepository $faqRepository,
		QuestionRepository $questionRepository
	) {
		$this->faqRepository = $faqRepository;
		$this->questionRepository = $questionRepository;
		$this->entityManager = $entityManager;
	}

	public function findFaqByCategory(Category $category, $limit, $offset) {
		return $this->faqRepository->findByCategory($category)
			->setFirstResult($offset)
			->setMaxResults($limit)
			->getQuery()->getResult();
	}

	public function findTopFaq($limit) {
		return $this->faqRepository->findTop($limit);
	}

	/**
	 * @param Question $question
	 */
	public function saveQuestion(Question $question) {
		$this->entityManager->persist($question);
		$this->entityManager->flush($question);
	}

}
