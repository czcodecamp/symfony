<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @author Tomáš Linhart <lin.tomeus@gmail.com>
 * @ORM\Entity(repositoryClass="AppBundle\Repository\QuestionRepository")
 */
class Question
{

	/**
	 * @var int
	 * @ORM\Id
	 * @ORM\GeneratedValue
	 * @ORM\Column(type="integer")
	 */
	private $id;

	/**
	 * @ORM\Column(type="string", length=255)
	 * @Assert\NotBlank()
	 * @Assert\Email()
	 */
	private $email;

	/**
	 * @ORM\Column(type="string", length=255)
	 * @Assert\NotBlank()
	 */
	private $firstName;

	/**
	 * @ORM\Column(type="string", length=255)
	 * @Assert\NotBlank()
	 */
	private $lastName;

	/**
	 * @var string
	 * @ORM\Column(type="text")
	 * @Assert\NotBlank()
	 */
	private $question;

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
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * @param string $email
	 * @return self
	 */
	public function setEmail($email)
	{
		$this->email = $email;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getFirstName()
	{
		return $this->firstName;
	}

	/**
	 * @param string $firstName
	 * @return self
	 */
	public function setFirstName($firstName)
	{
		$this->firstName = $firstName;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getLastName()
	{
		return $this->lastName;
	}

	/**
	 * @param string $lastName
	 * @return self
	 */
	public function setLastName($lastName)
	{
		$this->lastName = $lastName;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getQuestion()
	{
		return $this->question;
	}

	/**
	 * @param string $question
	 * @return self
	 */
	public function setQuestion($question)
	{
		$this->question = $question;
		return $this;
	}

}
