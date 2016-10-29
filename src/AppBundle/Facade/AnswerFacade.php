<?php

namespace AppBundle\Facade;

use AppBundle\Entity\Answer;
use AppBundle\Entity\Question;
use AppBundle\Repository\AnswerRepository;
use Doctrine\ORM\EntityManager;

class AnswerFacade
{
	/** @var AnswerRepository */
	private $answerRepository;

	/** @var EntityManager */
	private $entityManager;

	/**
	 * @param AnswerRepository $answerRepository
	 * @param EntityManager $entityManager
	 */
	public function __construct(AnswerRepository $answerRepository, EntityManager $entityManager)
	{
		$this->answerRepository = $answerRepository;
		$this->entityManager = $entityManager;
	}

	/**
	 * @param Question $question
	 * @return Answer|null
	 */
	public function findByQuestion(Question $question)
	{
		return $this->answerRepository->findOneBy([
			"question" => $question,
		]);
	}

	/**
	 * @param Question[] $questions
	 * @return Answer[]|null
	 */
	public function findByQuestions($questions)
	{
		/** @var Answer[] $answers */
		$answers = $this->answerRepository->findBy([
			"question" => $questions,
		]);

		$result = [];
		foreach ($answers as $answer) {
			$result[$answer->getQuestion()->getId()] = $answer;
		}

		return $result;
	}

	/**
	 * @param Answer $answer
	 */
	public function save(Answer $answer)
	{
		$this->entityManager->persist($answer);
		$this->entityManager->flush($answer);
	}
}