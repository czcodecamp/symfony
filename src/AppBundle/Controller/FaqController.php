<?php

namespace AppBundle\Controller;

use AppBundle\Facade\FaqFacade;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @author Jozef Liška <jfox@jfox.sk>
 * @Route(service="app.controller.faq_controller")
 */
class FaqController
{
    /**
     * @var FaqFacade
     */
	private $faqFacade;

	public function __construct(FaqFacade $faqFacade)
    {
		$this->faqFacade = $faqFacade;
	}

	/**
	 * @Route("/faq", name="faq")
	 * @Template("faq/faq.html.twig")
	 */
	public function faq()
	{
		return [
			"faq" => $this->faqFacade->getAll()
		];
	}

}
