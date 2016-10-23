<?php
namespace AppBundle\Controller;
use AppBundle\Entity\User;
use AppBundle\Facade\UserFacade;
use AppBundle\FormType\AddressFormType;
use AppBundle\FormType\PasswordFormType;
use AppBundle\FormType\RegistrationFormType;
use AppBundle\FormType\UserFormType;
use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;


/**
 * @author Vašek Boch <vasek.boch@live.com>
 * @author Jan Klat <jenik@klatys.cz>
 * @Route(service="app.controller.user_controller")
 */
class UserController
{
	private $userFacade;
	private $formFactory;
	private $passwordEncoder;
	private $entityManager;
	private $router;

	public function __construct(
        UserFacade $userFacade,
		FormFactory $formFactory,
		PasswordEncoderInterface $passwordEncoder,
		EntityManager $entityManager,
		RouterInterface $router
	) {
        $this->userFacade = $userFacade;
		$this->formFactory = $formFactory;
		$this->passwordEncoder = $passwordEncoder;
		$this->entityManager = $entityManager;
		$this->router = $router;
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

			// 3) Encode the password (you could also do this via Doctrine listener)
			$user->setPassword(
				$this->passwordEncoder->encodePassword($user->getPlainPassword(), null)
			);

			// 4) save the User!
			$this->entityManager->persist($user);
			$this->entityManager->flush();

			// ... do any other work - like sending them an email, etc
			// maybe set a "flash" success message for the user
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
    
    /**
     * @Route("/user/profile", name="user_profile")
     * @param Request $request
     * @return RedirectResponse|array
     * @Template("user/profile.html.twig")
     */
    public function profileAction(Request $request)
    {
        $user = $this->userFacade->getUser();
        
        if (!$user) {
            throw new UnauthorizedHttpException("Přihlašte se");
        }
        
        $form = $this->formFactory->create(UserFormType::class, $user);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted()) {
            
            $this->entityManager->persist($user);
            $this->entityManager->flush();
            
            return RedirectResponse::create($this->router->generate("user_profile"));
        }
        
        return [
            "form" => $form->createView(),
            "user" => $user,
        ];
    }
    
    /**
     * @Route("/user/password", name="user_password")
     * @param Request $request
     * @return RedirectResponse|array
     * @Template("user/password.html.twig")
     */
    public function passwordAction(Request $request)
    {
        $user = $this->userFacade->getUser();
        
        if (!$user) {
            throw new UnauthorizedHttpException("Přihlašte se");
        }
        
        $form = $this->formFactory->create(PasswordFormType::class, $user);
        
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
            $user->setPassword(
                $this->passwordEncoder->encodePassword($user->getPlainPassword(), null)
            );
            
            $this->entityManager->persist($user);
            $this->entityManager->flush();
            
            return RedirectResponse::create($this->router->generate("user_password"));
        }
        
        return [
            "form" => $form->createView(),
            "user" => $user,
        ];
    }
    
    /**
     * @Route("/user/address", name="user_address")
     * @param Request $request
     * @return RedirectResponse|array
     * @Template("user/address.html.twig")
     */
    public function addressAction(Request $request)
    {
        $user = $this->userFacade->getUser();
        
        if (!$user) {
            throw new UnauthorizedHttpException("Přihlašte se");
        }
    
        $form = $this->formFactory->create(AddressFormType::class, $user);
        
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            
            $this->entityManager->persist($user);
            $this->entityManager->flush();
            
            return RedirectResponse::create($this->router->generate("user_address"));
        }
        
        return [
            "form" => $form->createView(),
            "user" => $user,
        ];
    }
    
    
}