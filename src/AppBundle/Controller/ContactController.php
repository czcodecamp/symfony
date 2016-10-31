<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Contact;
use AppBundle\Facade\ContactFacade;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\FormType\ContactFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormFactory;
use Doctrine\ORM\EntityManager;

/**
 * @author Aleš
 * @Route(service="app.controller.contact_controller")
 */
class ContactController {

        private $contactFacade;
        
        private $formFactory;
        
        private $entityManager;

        public function __construct(ContactFacade $contactFacade, FormFactory $formFactory, EntityManager $entityManager) {
                $this->contactFacade = $contactFacade;
                $this->formFactory = $formFactory;
                $this->entityManager = $entityManager;
        }

        /**
         * @Route("/contact", name="contact")
         * @Template("contact/contact.html.twig")
         * 
	 * @param Request $request
	 * @return array
         */
        public function contactAction(Request $request) {
                $contact = new Contact();
		$form = $this->formFactory->create(ContactFormType::class, $contact);

		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
			$this->entityManager->persist($contact);
			$this->entityManager->flush([$contact]);
		}
                
                return [
			"form" => $form->createView(),
                ];
        }

}
