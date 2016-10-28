<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ContactMsg;
use AppBundle\Facade\ContactFacade;
use AppBundle\FormType\ContactFormType;
use AppBundle\Facade\UserFacade;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\Routing\RouterInterface;

/**
 *  * @Route(service="app.controller.contact_controller")
 */
class ContactController
{

    private $contactFacade;
    private $userFacade;
    private $formFactory;
    private $router;

    public function __construct(
    ContactFacade $contactFacade, UserFacade $userFacade, FormFactory $formFactory, RouterInterface $router
    )
    {
	$this->contactFacade = $contactFacade;
	$this->userFacade = $userFacade;
	$this->formFactory = $formFactory;
	$this->router = $router;	
    }

    /**
     * @Route("/kontakty", name="contact")
     * @Template("contact/contact.html.twig")
     *
     * @param Request $request
     * @return RedirectResponse|array
     */
    public function contactAction(Request $request)
    {
	$msg = new ContactMsg();
	$msg->setUser($this->userFacade->getUser());
	$form = $this->formFactory->create(ContactFormType::class, $msg);

	$form->handleRequest($request);
	if ($form->isSubmitted() && $form->isValid())
	{
	    $this->contactFacade->save($msg);

	    return RedirectResponse::create($this->router->generate("homepage"));
	}

	return [
	    "form" => $form->createView(),
	];
    }

}
