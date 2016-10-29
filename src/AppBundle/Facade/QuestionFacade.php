<?php

namespace AppBundle\Facade;

use AppBundle\Entity\Question;
use AppBundle\Repository\QuestionRepository;
use Doctrine\ORM\EntityManager;

class QuestionFacade
{
	/** @var QuestionRepository */
	private $questionRepository;

	/** @var EntityManager */
	private $entityManager;

	/**
	 * @param QuestionRepository $questionRepository
	 * @param EntityManager $entityManager
	 */
	public function __construct(QuestionRepository $questionRepository, EntityManager $entityManager)
	{
		$this->questionRepository = $questionRepository;
		$this->entityManager = $entityManager;
	}

	/**
	 * @return Question
	 */
	public function findById($id)
	{
		return $this->questionRepository->findOneBy([
			'id' => $id,
		]);
	}

	/**
	 * @return Question[]
	 */
	public function findAll()
	{
		return $this->questionRepository->findAll();
	}

	/**
	 * @param Question $question
	 */
	public function save(Question $question)
	{
		$this->entityManager->persist($question);
		$this->entityManager->flush($question);
	}
}