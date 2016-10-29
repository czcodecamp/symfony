<?php

namespace AppBundle\FormType\VO;

use AppBundle\Entity\Answer;
use AppBundle\Entity\Question;

class FaqVO
{
	/** @var string|null */
	private $question;

	/** @var string|null */
	private $answer;

	/**
	 * @return null|string
	 */
	public function getQuestion()
	{
		return $this->question;
	}

	/**
	 * @param null|string $question
	 */
	public function setQuestion($question)
	{
		$this->question = $question;
	}

	/**
	 * @return null|string
	 */
	public function getAnswer()
	{
		return $this->answer;
	}

	/**
	 * @param null|string $answer
	 */
	public function setAnswer($answer)
	{
		$this->answer = $answer;
	}

	/**
	 * @param Question $question
	 * @param Answer $answer
	 * @return FaqVO
	 */
	public static function fromEntity(Question $question, Answer $answer)
	{
		$faqVO = new FaqVO();
		$faqVO->setQuestion($question->getText());
		$faqVO->setAnswer($answer->getText());

		return $faqVO;
	}
}