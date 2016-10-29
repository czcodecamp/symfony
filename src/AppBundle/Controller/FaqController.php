<?php

namespace AppBundle\Controller;

use AppBundle\Facade\AnswerFacade;
use AppBundle\Facade\QuestionFacade;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route(service="app.controller.faq_controller")
 */
class FaqController
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
	 * @Route("/faq", name="faq")
	 * @Template("faq/faq.html.twig")
	 */
	public function faqAction(Request $request)
	{
		$questions = $this->questionFacade->findAll();
		$answers = $this->answerFacade->findByQuestions($questions);

		return [
			"questions" => $questions,
			"answers" => $answers,
		];
	}
}