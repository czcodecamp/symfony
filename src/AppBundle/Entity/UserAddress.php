<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @author Tomáš Linhart <lin.tomeus@gmail.com>
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserAddressRepository")
 * @ORM\Table(name="user_address")
 */
class UserAddress
{

	/**
	 * @var int
	 * @ORM\Id
	 * @ORM\GeneratedValue
	 * @ORM\Column(type="integer")
	 */
	private $id;

	/**
	 * @var User
	 * @ORM\ManyToOne(targetEntity="User")
	 */
	private $user;

	/**
	 * @var Address
	 * @ORM\ManyToOne(targetEntity="Address")
	 */
	private $address;

	/**
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return User
	 */
	public function getUser() {
		return $this->user;
	}

	/**
	 * @param User $user
	 * @return self
	 */
	public function setUser(User $user) {
		$this->user = $user;
		return $this;
	}

	/**
	 * @return Address
	 */
	public function getAddress()
	{
		return $this->address;
	}

	/**
	 * @param Address $address
	 * @return self
	 */
	public function setAddress(Address $address)
	{
		$this->address = $address;
		return $this;
	}

}
