<?php

namespace AppBundle\Controller;

use AppBundle\Facade\MessageFacade;
use AppBundle\FormType\ContactFormType;
use AppBundle\FormType\VO\MessageVO;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;

/**
 * @Route(service="app.controller.contact_controller")
 */
class ContactController
{
	/** @var FormFactory */
	private $formFactory;

	/** @var MessageFacade */
	private $messageFacade;

	/** @var RouterInterface */
	private $router;

	/**
	 * @param FormFactory $formFactory
	 * @param MessageFacade $messageFacade
	 * @param RouterInterface $router
	 */
	public function __construct(FormFactory $formFactory, MessageFacade $messageFacade, RouterInterface $router)
	{
		$this->formFactory = $formFactory;
		$this->messageFacade = $messageFacade;
		$this->router = $router;
	}

	/**
	 * @Route("/contact", name="contact")
	 * @Template("contact/contact.html.twig")
	 */
	public function contactAction(Request $request)
	{
		$messageVO = new MessageVO();
		$form = $this->formFactory->create(ContactFormType::class, $messageVO);

		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
			$this->messageFacade->save($messageVO);

			return RedirectResponse::create($this->router->generate("contact"));
		}

		return [
			"form" => $form->createView()
		];
	}
}