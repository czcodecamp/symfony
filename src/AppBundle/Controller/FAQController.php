<?php

namespace AppBundle\Controller;

use AppBundle\Facade\FAQFacade;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @Route(service="app.controller.faq_controller")
 */
class FAQController
{
    private $faqFacade;

    public function __construct(FAQFacade $faqFacade)
    {
        $this->faqFacade = $faqFacade;
    }

    /**
     * @Route("/faq", name="faq")
     * @Template("faq/faq.html.twig")
     */
    public function faqDetailAction()
    {
        $faq = $this->faqFacade->getAll();
        if (!$faq) {
            throw new NotFoundHttpException("Žádné otázky a odpovědi nenalezeny.");
        }

        return [
            "faq" => $faq,
        ];
    }
}