<?php

namespace AppBundle\Facade;

use AppBundle\Entity\Message;
use AppBundle\FormType\VO\MessageVO;
use Doctrine\ORM\EntityManager;

class MessageFacade
{
	/** @var EntityManager */
	private $entityManager;

	/**
	 * @param EntityManager $entityManager
	 */
	public function __construct(EntityManager $entityManager)
	{
		$this->entityManager = $entityManager;
	}

	/**
	 * @param MessageVO $messageVO
	 */
	public function save(MessageVO $messageVO)
	{
		$message = new Message();

		$message->setEmail($messageVO->getEmail());
		$message->setText($messageVO->getText());

		$this->entityManager->persist($message);
		$this->entityManager->flush($message);
	}
}