<?php

namespace AppBundle\Controller;

use AppBundle\Facade\FaqFacade;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route(service="app.controller.faq_controller")
 */
class FaqController extends Controller
{
	private $faqFacade;

	public function __construct(FaqFacade $faqFacade)
	{
		$this->faqFacade = $faqFacade;
	}

    /**
     * @Route("/faqs", name="faqs")
     * @Template("faq/faqs.html.twig")
     */
    public function readFaqsAction()
    {
    	$allFaqs = $this->faqFacade->getAllFaqs();

        return [
			"allFaqs" => $allFaqs
        ];
    }

}
