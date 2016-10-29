<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class Message
{
	/**
	 * @ORM\Id
	 * @ORM\GeneratedValue
	 * @ORM\Column(type="integer")
	 * @var int
	 */
	private $id;

	/**
	 * @ORM\Column(type="string", length=255, unique=true, name="email")
	 * @Assert\NotBlank()
	 * @Assert\Email()
	 * @var string
	 */
	private $email;

	/**
	 * @ORM\Column(type="string")
	 * @var string
	 */
	private $text;

	/**
	 * @return int
	 */
	public function getId(): int
	{
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function getEmail() : string
	{
		return $this->email;
	}

	/**
	 * @param string $email
	 */
	public function setEmail(string $email)
	{
		$this->email = $email;
	}

	/**
	 * @return string
	 */
	public function getText(): string
	{
		return $this->text;
	}

	/**
	 * @param string $text
	 */
	public function setText(string $text)
	{
		$this->text = $text;
	}
}