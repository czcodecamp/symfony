<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Faq;
use AppBundle\Facade\FaqFacade;
use Doctrine\ORM\EntityManager;
use AppBundle\Facade\CategoryFacade;
use AppBundle\Facade\UserFacade;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 *  * @Route(service="app.controller.faq_controller")
 */
class FaqController
{

    private $faqFacade;    
    private $userFacade;

    public function __construct(
    FaqFacade $faqFacade, UserFacade $userFacade
    )
    {

	$this->faqFacade = $faqFacade;
	$this->userFacade = $userFacade;
    }

    /**
     * @Route("/faq", name="faq")
     * @Template("faq/faq.html.twig")
     */
    public function faqAction()
    {
	$faqs = $this->faqFacade->getAll();

	return [
	    "faqs" => $faqs,	    
	    "user" => $this->userFacade->getUser(),
	];
    }

}
