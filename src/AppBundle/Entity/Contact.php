<?php

namespace AppBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\ORM\Mapping as ORM;

/**
 * Faq
 *
 * @ORM\Table(name="contact")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ContactRepository")
 */
class Contact
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, name="email")
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;

	/**
	 * @ORM\Column(type="text")
	 * @Assert\NotBlank()
	 */
	private $message;

	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param int $id
	 * @return Contact
	 */
	public function setId($id)
	{
		$this->id = $id;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param mixed $name
	 * @return Contact
	 */
	public function setName($name)
	{
		$this->name = $name;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * @param mixed $email
	 * @return Contact
	 */
	public function setEmail($email)
	{
		$this->email = $email;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getMessage()
	{
		return $this->message;
	}

	/**
	 * @param mixed $message
	 * @return Contact
	 */
	public function setMessage($message)
	{
		$this->message = $message;
		return $this;
	}


}

