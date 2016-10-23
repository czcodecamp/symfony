<?php
namespace AppBundle\Facade;
use AppBundle\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
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

	public function __construct(
		TokenStorage $tokenStorage,
		AuthenticationUtils $authenticationUtils
	) {
		$this->tokenStorage = $tokenStorage;
		$this->authenticationUtils = $authenticationUtils;
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

}