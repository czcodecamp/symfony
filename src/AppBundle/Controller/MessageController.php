<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Message;
use AppBundle\Facade\MessageFacade;
use AppBundle\FormType\MessageFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;


/**
 * @author Jozef Liška <jfox@jfox.sk>
 * @Route(service="app.controller.message_controller")
 */
class MessageController
{
	private $messageFacade;
	private $formFactory;
	private $router;

	public function __construct(
        MessageFacade $messageFacade,
		FormFactory $formFactory,
		RouterInterface $router
	) {
		$this->messageFacade = $messageFacade;
		$this->formFactory = $formFactory;
		$this->router = $router;
	}

	/**
	 * @Route("/kontakt", name="message_add")
	 * @Template("message/add.html.twig")
	 *
	 * @param Request $request
	 * @return RedirectResponse|array
	 */
	public function addAction(Request $request)
	{
		$message = new Message();
		$form = $this->formFactory->create(MessageFormType::class, $message);

		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {

			$this->messageFacade->saveMessage($message);

            $request->getSession()->getFlashBag()->add('success', 'Vaša správa bola odoslaná');

			return RedirectResponse::create($this->router->generate("homepage"));
		}

		return [
			"form" => $form->createView(),
		];
	}
}
