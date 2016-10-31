<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @author Tomáš Linhart <lin.tomeus@gmail.com>
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FaqRepository")
 */
class Faq
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
	private $question;

	/**
	 * @var string
	 * @ORM\Column(type="string")
	 * @Assert\NotBlank()
	 */
	private $answer;

	/**
	 * @var int
	 * @ORM\Column(type="integer")
	 */
	private $rank;

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

	/**
	 * @return string
	 */
	public function getAnswer()
	{
		return $this->answer;
	}

	/**
	 * @param string $answer
	 * @return self
	 */
	public function setAnswer($answer)
	{
		$this->answer = $answer;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getRank()
	{
		return $this->rank;
	}

	/**
	 * @param int $rank
	 * @return self
	 */
	public function setRank($rank)
	{
		$this->rank = $rank;
		return $this;
	}

}
