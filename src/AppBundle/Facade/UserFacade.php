<?php
namespace AppBundle\Facade;
use AppBundle\Entity\Address;
use AppBundle\Entity\User;
use AppBundle\FormType\VO\UserSettingsVO;
use AppBundle\Repository\UserRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Symfony\Component\Security\Core\Authentication\AuthenticationManagerInterface;
use Symfony\Component\Security\Core\Authentication\AuthenticationProviderManager;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * @author Vašek Boch <vasek.boch@live.com>
 * @author Jan Klat <jenik@klatys.cz>
 */
class UserFacade
{

	private $tokenStorage;
	private $authenticationUtils;
	private $entityManager;

	/**
	 * @var UserRepository
	 */
	private $userRepository;

	public function __construct(
		TokenStorage $tokenStorage,
		AuthenticationUtils $authenticationUtils,
		EntityManager $entityManager,
		AuthenticationProviderManager $authenticationManager,
		UserRepository $userRepository
	) {
		$this->tokenStorage = $tokenStorage;
		$this->authenticationUtils = $authenticationUtils;
		$this->entityManager = $entityManager;
		$this->authenticationManager = $authenticationManager;
		$this->userRepository = $userRepository;
	}

	/**
	 * @return User
	 */
	public function getUser()
	{
		if (null === $token = $this->tokenStorage->getToken()) {
			return;
		}

		if (!is_object($user = $token->getUser())) {
			return;
		}

		return $user;
	}

	/**
	 * @return null|AuthenticationException
	 */
	public function getAuthenticationError()
	{
		return $this->authenticationUtils->getLastAuthenticationError();
	}

	/**
	 * @return string
	 */
	public function getLastUsername()
	{
		return $this->authenticationUtils->getLastUsername();
	}

	/**
	 * @param UserSettingsVO $settingsVO
	 */
	public function saveUserSettings(UserSettingsVO $settingsVO)
	{
		if (!$this->getUser()) {
			throw new UnauthorizedHttpException("no user logged in");
		}

		$user = $this->getUser();
		$user->setFirstName($settingsVO->getFirstName())
			->setLastName($settingsVO->getLastName())
			->setPhone($settingsVO->getPhone());

		$this->entityManager->persist($user);
		$this->entityManager->flush([$user]);
	}

	public function saveUser(User $user)
	{
		$this->entityManager->persist($user);
		$this->entityManager->flush([$user]);
	}

	public function saveAddress(Address $address)
	{
		$this->entityManager->persist($address);
		$this->entityManager->flush([$address]);
	}

	/**
	 * @return User[]
	 */
	public function getUsers()
	{
		return $this->userRepository->findBy([], ["id" => "desc"]);
	}

	/**
	 * @param int $userId
	 * @return null|object
	 */
	public function getUserById($userId)
	{
		return $this->userRepository->findOneBy([
			"id" => $userId
		]);
	}

}
