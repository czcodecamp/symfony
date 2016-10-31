<?php

namespace AppBundle\Facade;

use AppBundle\Entity\Category;
use AppBundle\Entity\Faq;
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

	/**
	 * @return array
	 */
	public function findAllFaq()
	{
		return $this->faqRepository->findBy([], ["id" => "asc"]);
	}

	/**
	 * @param int $id
	 * @return Faq|null
	 */
	public function findFaqById($id)
	{
		return $this->faqRepository->findOneBy(["id" => $id]);
	}

	/**
	 * @param Faq $faq
	 */
	public function saveFaq(Faq $faq)
	{
		$this->entityManager->persist($faq);
		$this->entityManager->flush($faq);
	}

	/**
	 * @param Faq $faq
	 */
	public function deleteFaq(Faq $faq)
	{
		$this->entityManager->remove($faq);
		$this->entityManager->flush($faq);
	}

}
