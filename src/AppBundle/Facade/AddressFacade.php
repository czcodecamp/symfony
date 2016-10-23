<?php
namespace AppBundle\Facade;
use AppBundle\Entity\User;
use AppBundle\Repository\AddressRepository;
use AppBundle\Repository\UserAddressRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * @author Tomáš Linhart <lin.tomeus@gmail.com>
 */
class AddressFacade
{

	/**
	 * @var UserAddressRepository
	 */
	private $userAddressRepository;

	/**
	 * AddressFacade constructor.
	 * @param UserAddressRepository $userAddressRepository
	 */
	public function __construct(UserAddressRepository $userAddressRepository)
	{
		$this->userAddressRepository = $userAddressRepository;
	}

	/**
	 * @param User $user
	 * @return array
	 */
	public function getAllUserAddresses(User $user)
	{
		return $this->userAddressRepository->findAllUserAddresses($user);
	}

	public function getOneById(User $user, $addressId)
	{
		return $this->userAddressRepository->getOneUserAddress($user, $addressId);
	}

}
