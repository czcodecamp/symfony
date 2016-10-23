<?php

namespace AppBundle\Controller;

use AppBundle\Facade\UserFacade;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

/**
 * @author Tomáš Linhart <lin.tomeus@gmail.com>
 *
 * @Route(service="app.controller.address_controller")
 */
class AddressController
{
	private $userFacade;

	public function __construct(UserFacade $userFacade)
	{
		$this->userFacade = $userFacade;
	}
	/**
	 * @Route("/user/address/add", name="address_add")
	 * @Template("address/add.html.twig")
	 */
	public function addressAddAction(Request $request)
	{
		$user = $this->userFacade->getUser();
		if (!$user) {
			throw new UnauthorizedHttpException("Přihlašte se");
		}

		return [
		];
	}

}
