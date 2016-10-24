<?php
namespace AppBundle\Controller;
use AppBundle\Entity\User;
use AppBundle\Facade\UserFacade;
use AppBundle\FormType\AddressFormType;
use AppBundle\FormType\RegistrationFormType;
use AppBundle\FormType\UserSettingsFormType;
use AppBundle\FormType\VO\UserSettingsVO;
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
			$this->entityManager->flush([$user]);

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
	 * @Route("/nastaveni", name="user_settings")
	 * @Template("user/settings.html.twig")
	 *
	 * @param Request $request
	 * @return array
	 */
	public function userDetailsAction(Request $request)
	{
		if (!$this->userFacade->getUser()) {
			throw new UnauthorizedHttpException("Přihlašte se prosím");
		}

		$settingsVO = UserSettingsVO::createFromUser($this->userFacade->getUser());

		$form = $this->formFactory->create(UserSettingsFormType::class, $settingsVO);

		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
			$this->userFacade->saveUserSettings($settingsVO);
		}

		return [
			"form" => $form->createView(),
			"user" => $this->userFacade->getUser(),
		];
	}

	/**
	 * @Route("/adresa/{id}", name="edit_address")
	 * @Template("user/address_edit.html.twig")
	 *
	 * @param Request $request
	 * @return array|RedirectResponse
	 */
	public function editAddressAction(Request $request)
	{
		$user = $this->userFacade->getUser();
		$editAddress = false;
		foreach ($user->getAddresses() as $address) {
			if($address->getId() == $request->attributes->get("id")) {
				$editAddress = $address;
				break;
			}
		}
		if (!$user || !$editAddress) {
			throw new UnauthorizedHttpException("Stránku nelze zobrazit");
		}

		$form = $this->formFactory->create(AddressFormType::class, $editAddress);

		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
			$this->userFacade->saveAddress($editAddress);
			return RedirectResponse::create($this->router->generate("user_settings"));
		}

		return [
			"form" => $form->createView(),
		];
	}

}