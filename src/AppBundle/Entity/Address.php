<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @author Tomáš Linhart <lin.tomeus@gmail.com>
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AddressRepository")
 */
class Address
{

	/**
	 * @var int
	 * @ORM\Id
	 * @ORM\GeneratedValue
	 * @ORM\Column(type="integer")
	 */
	private $id;

	/**
	 * @var string
	 * @ORM\Column(type="string")
	 * @Assert\NotBlank()
	 */
	private $name;

	/**
	 * @var string
	 * @ORM\Column(type="string")
	 * @Assert\NotBlank()
	 */
	private $city;

	/**
	 * @var string
	 * @ORM\Column(type="string")
	 * @Assert\NotBlank()
	 */
	private $street;

	/**
	 * @var int
	 * @ORM\Column(type="integer")
	 * @Assert\NotBlank()
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
	 * @param int $id
	 * @return self
	 */
	public function setId($id)
	{
		$this->id = $id;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param string $name
	 * @return self
	 */
	public function setName($name)
	{
		$this->name = $name;
		return $this;
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
	 * @return self
	 */
	public function setCity($city)
	{
		$this->city = $city;
		return $this;
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
	 * @return self
	 */
	public function setStreet($street)
	{
		$this->street = $street;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getZip()
	{
		return $this->zip;
	}

	/**
	 * @param int $zip
	 * @return self
	 */
	public function setZip($zip)
	{
		$this->zip = $zip;
		return $this;
	}

}
