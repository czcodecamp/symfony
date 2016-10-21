<?php
namespace AppBundle\Controller;
use AppBundle\Entity\User;
use AppBundle\Facade\UserFacade;
use AppBundle\FormType\RegistrationFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Symfony\Component\Routing\RouterInterface;
use AppBundle\Service\UserModel;


/**
 * @author Vašek Boch <vasek.boch@live.com>
 * @author Jan Klat <jenik@klatys.cz>
 * @Route(service="app.controller.user_controller")
 */
class UserController
{
	private $userFacade;
	private $formFactory;	
	private $router;
	private $userModel;

	public function __construct(
		UserFacade $userFacade,
		FormFactory $formFactory,				
		RouterInterface $router,
		UserModel $userModel
	) {
		$this->userFacade = $userFacade;
		$this->formFactory = $formFactory;		
		$this->router = $router;
		$this->userModel = $userModel;
	}

	/**
	 * @Route("/registrovat", name="user_registration")
	 * @Template("user/registration.html.twig")
	 *
	 * @param Request $request
	 * @return RedirectResponse|array
	 */
	public function registrationAction(Request $request)
	{
		// 1) build the form
		$user = new User();
		$form = $this->formFactory->create(RegistrationFormType::class, $user);

		// 2) handle the submit (will only happen on POST)
		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {			
			$this->userModel->registerUser($user);		
			return RedirectResponse::create($this->router->generate("homepage"));
		}

		return [
			"form" => $form->createView(),
		];
	}

	/**
	 * @Route("/prihlasit", name="user_login")
	 * @Template("user/login.html.twig")
	 *
	 * @return RedirectResponse|array
	 */
	public function loginAction()
	{
		return [
			"last_username" => $this->userFacade->getLastUsername(),
			"error" => $this->userFacade->getAuthenticationError(),
		];
	}

	/**
	 * @Route("/odhlasit", name="user_logout")
	 */
	public function logoutAction()
	{}

	/**
	 * @Route("/uzivatel/super-tajna-stranka", name="supersecret")
	 * @Template("user/supersecret.html.twig")
	 *
	 * @return array
	 */
	public function superSecretAction()
	{
		if (!$this->userFacade->getUser()) {
			throw new UnauthorizedHttpException("Přihlašte se");
		}
		return [
			"user" => $this->userFacade->getUser(),
		];
	}

}