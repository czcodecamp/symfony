<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class Address
{
	/**
	 * @var int
	 * @ORM\Id
	 * @ORM\GeneratedValue
	 * @ORM\Column(type="integer")
	 * @var int
	 */
	private $id;

	/**
	 * @ORM\Column(type="string", length=255)
	 * @Assert\NotBlank()
	 * @var string
	 */
	private $street;

	/**
	 * @ORM\Column(type="string", length=255)
	 * @Assert\NotBlank()
	 * @var string
	 */
	private $city;

	/**
	 * @ORM\Column(type="string", length=255)
	 * @Assert\NotBlank()
	 * @var string
	 */
	private $zip;

	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function getStreet()
	{
		return $this->street;
	}

	/**
	 * @param string $street
	 */
	public function setStreet(string $street)
	{
		$this->street = $street;
	}

	/**
	 * @return string
	 */
	public function getCity()
	{
		return $this->city;
	}

	/**
	 * @param string $city
	 */
	public function setCity(string $city)
	{
		$this->city = $city;
	}

	/**
	 * @return string
	 */
	public function getZip()
	{
		return $this->zip;
	}

	/**
	 * @param string $zip
	 */
	public function setZip(string $zip)
	{
		$this->zip = $zip;
	}
}