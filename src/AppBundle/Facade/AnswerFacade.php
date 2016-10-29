<?php

namespace AppBundle\Facade;

use AppBundle\Entity\Answer;
use AppBundle\Entity\Question;
use AppBundle\Repository\AnswerRepository;

class AnswerFacade
{
	/** @var AnswerRepository */
	private $answerRepository;

	/**
	 * @param AnswerRepository $answerRepository
	 */
	public function __construct(AnswerRepository $answerRepository)
	{
		$this->answerRepository = $answerRepository;
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
}