<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Address;
use AppBundle\Entity\UserAddress;
use AppBundle\Facade\UserFacade;
use AppBundle\FormType\AddressFormType;
use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Symfony\Component\Routing\RouterInterface;

/**
 * @author Tomáš Linhart <lin.tomeus@gmail.com>
 *
 * @Route(service="app.controller.address_controller")
 */
class AddressController
{

	/**
	 * @var UserFacade
	 */
	private $userFacade;

	/**
	 * @var FormFactory
	 */
	private $formFactory;

	/**
	 * @var EntityManager
	 */
	private $entityManager;

	/**
	 * @var RouterInterface
	 */
	private $router;

	public function __construct(
		RouterInterface $router,
		EntityManager $entityManager,
		UserFacade $userFacade,
		FormFactory $formFactory
	) {
		$this->userFacade = $userFacade;
		$this->formFactory = $formFactory;
		$this->entityManager = $entityManager;
		$this->router = $router;
	}

	/**
	 * @Route("/uzivatel/pridat-adresu", name="address_add")
	 * @Template("address/add.html.twig")
	 */
	public function addressAddAction(Request $request)
	{
		$user = $this->userFacade->getUser();
		if (!$user) {
			throw new UnauthorizedHttpException("Přihlašte se");
		}

		$address = new Address();
		$form = $this->formFactory->create(AddressFormType::class, $address);

		// 2) handle the submit (will only happen on POST)
		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {

			$userAddress = new UserAddress();
			$userAddress->setUser($user)->setAddress($address);

			$this->entityManager->persist($address);
			$this->entityManager->persist($userAddress);
			$this->entityManager->flush();

			// TODO: message

			return RedirectResponse::create($this->router->generate("user_profile"));
		}

		return [
			"form" => $form->createView(),
		];
	}

}
