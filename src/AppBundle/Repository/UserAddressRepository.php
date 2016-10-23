<?php

namespace AppBundle\Repository;

use AppBundle\Entity\User;
use Doctrine\ORM\EntityRepository;

class UserAddressRepository extends EntityRepository
{

	public function findAllUserAddresses(User $user)
	{
		$query = $this->_em->createQuery('SELECT a
			FROM AppBundle\Entity\UserAddress ua
			JOIN AppBundle\Entity\Address a WITH a = ua.address
			WHERE ua.user = :user
		')
			->setParameter("user", $user);
		return $query->execute();
	}

	public function getOneUserAddress(User $user, $addressId)
	{
		$query = $this->_em->createQuery('SELECT a
			FROM AppBundle\Entity\UserAddress ua
			JOIN AppBundle\Entity\Address a WITH a = ua.address
			WHERE ua.user = :user AND a.id = :id
		')
			->setParameter("user", $user)
			->setParameter("id", $addressId);
		return $query->getSingleResult();
	}
}
