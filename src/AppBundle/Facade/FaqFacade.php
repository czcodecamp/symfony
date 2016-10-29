<?php

namespace AppBundle\Facade;

use AppBundle\Entity\Answer;
use AppBundle\Entity\Question;
use AppBundle\FormType\VO\FaqVO;

class FaqFacade
{
	/** @var QuestionFacade */
	private $questionFacade;

	/** @var AnswerFacade */
	private $answerFacade;

	/**
	 * @param QuestionFacade $questionFacade
	 * @param AnswerFacade $answerFacade
	 */
	public function __construct(QuestionFacade $questionFacade, AnswerFacade $answerFacade)
	{
		$this->questionFacade = $questionFacade;
		$this->answerFacade = $answerFacade;
	}

	/**
	 * @param FaqVO $faqVO
	 */
	public function insert(FaqVO $faqVO)
	{
		$question = new Question();
		$answer = new Answer();
		$answer->setQuestion($question);

		$question->setText($faqVO->getQuestion());
		$answer->setText($faqVO->getAnswer());

		$this->questionFacade->save($question);
		$this->answerFacade->save($answer);
	}

	/**
	 * @param Question $question
	 * @param Answer $answer
	 * @param FaqVO $faqVO
	 */
	public function update(Question $question, Answer $answer, FaqVO $faqVO)
	{
		$question->setText($faqVO->getQuestion());
		$answer->setText($faqVO->getAnswer());

		$this->questionFacade->save($question);
		$this->answerFacade->save($answer);
	}
}