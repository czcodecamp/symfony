<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AnswerRepository")
 */
class Answer
{
	/**
	 * @ORM\Id
	 * @ORM\GeneratedValue
	 * @ORM\Column(type="integer")
	 * @var int
	 */
	private $id;

	/**
	 * @ORM\ManyToOne(targetEntity="Question")
	 * @var Question
	 */
	private $question;

	/**
	 * @ORM\Column(type="string")
	 * @var string
	 */
	private $text;

	/**
	 * @return int
	 */
	public function getId() : int
	{
		return $this->id;
	}

	/**
	 * @return Question
	 */
	public function getQuestion() : Question
	{
		return $this->question;
	}

	/**
	 * @param Question $question
	 */
	public function setQuestion(Question $question)
	{
		$this->question = $question;
	}

	/**
	 * @return string
	 */
	public function getText() : string
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