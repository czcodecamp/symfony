<?php

namespace AppBundle\Facade;

use AppBundle\Entity\Question;
use AppBundle\Repository\QuestionRepository;

class QuestionFacade
{
	/** @var QuestionRepository */
	private $questionRepository;

	/**
	 * @param QuestionRepository $questionRepository
	 */
	public function __construct(QuestionRepository $questionRepository)
	{
		$this->questionRepository = $questionRepository;
	}

	/**
	 * @return Question[]
	 */
	public function findAll()
	{
		return $this->questionRepository->findAll();
	}
}