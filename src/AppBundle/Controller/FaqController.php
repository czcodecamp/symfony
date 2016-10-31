<?php

namespace AppBundle\Controller;

use AppBundle\Facade\FaqFacade;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @author Aleš
 * @Route(service="app.controller.faq_controller")
 */
class FaqController {

        private $faqFacade;

        public function __construct(FaqFacade $faqFacade) {
                $this->faqFacade = $faqFacade;
        }

        /**
         * @Route("/", name="faq")
         * @Template("faq/faq.html.twig")
         */
        public function faqAction() {
                $faq = $this->faqFacade->getAll();
                return [
                    'faq' => $faq
                ];
        }

}
