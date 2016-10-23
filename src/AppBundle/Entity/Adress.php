<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
	 */
	private $name;

	/**
	 * @var string
	 * @ORM\Column(type="string")
	 */
	private $city;

	/**
	 * @var string
	 * @ORM\Column(type="string")
	 */
	private $street;

	/**
	 * @var int
	 * @ORM\Column(type="integer")
	 */
	private $zip;

}
