<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Contact;
use AppBundle\Facade\ContactFacade;
use AppBundle\FormType\ContactFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;

/**
 * @Route(service="app.controller.contact_controller")
 */
class ContactController extends Controller
{

	private $contactFacade;
	private $formFactory;
	private $router;

	public function __construct(
		ContactFacade $contactFacade,
		FormFactory $formFactory,
		RouterInterface $router
	) {
		$this->contactFacade = $contactFacade;
		$this->formFactory = $formFactory;
		$this->router = $router;
	}

	/**
	 * @Route("/contact", name="contact")
	 * @Template("contact/contact.html.twig")
	 *
	 * @param Request $request
	 * @return RedirectResponse|array
	 */
    public function contactAction(Request $request)
    {
	    $contact = new Contact();
	    $form = $this->formFactory->create(ContactFormType::class, $contact);

	    $form->handleRequest($request);
	    if ($form->isSubmitted() && $form->isValid()) {

	    	$contact = $this->contactFacade->setNewContactMessage($contact);
		    if(null != $contact->getId()) {
			    $request->getSession()->getFlashBag()->add(
				    'success',
				    'Vaše zpráva byla odeslána'
			    );
		    } else {
			    $request->getSession()->getFlashBag()->add(
				    'error',
				    'Vaše nebyla odeslána. Zkuste to prosím znovu.'
			    );
		    }

		    return RedirectResponse::create($this->router->generate("contact"));


	    }

	    return [
		    "form" => $form->createView(),
	    ];
    }

}
