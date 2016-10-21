<?php
namespace AppBundle\Controller;
use AppBundle\Entity\User;
use AppBundle\Facade\UserFacade;
use AppBundle\FormType\RegistrationFormType;
use AppBundle\FormType\UserEditFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Symfony\Component\Routing\RouterInterface;
use AppBundle\Service\UserService;


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
	private $userService;

	public function __construct(
		UserFacade $userFacade,
		FormFactory $formFactory,				
		RouterInterface $router,
		UserService $userService
	) {
		$this->userFacade = $userFacade;
		$this->formFactory = $formFactory;		
		$this->router = $router;
		$this->userService = $userService;
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
			$this->userService->registerUser($user);		
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
	 * @Route("/profil", name="user_profile")
	 * @Template("user/profile.html.twig")
	 */
	public function profileAction(Request $request){
	    
	    $user = $this->userFacade->getUser();
	    $form = $this->formFactory->create(UserEditFormType::class, $user);
	    
	    $form->handleRequest($request);
	    
	    if ($form->isSubmitted() && $form->isValid()) {
		$this->userService->saveUser($user);
		return RedirectResponse::create($this->router->generate("homepage"));
	    }
		
	    return [
			"form" => $form->createView(),
			"user" => $this->userFacade->getUser(),
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