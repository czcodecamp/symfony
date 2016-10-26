<?php

namespace AppBundle\Facade;

use AppBundle\Entity\Message;
use AppBundle\Repository\MessageRepository;
use Doctrine\ORM\EntityManager;

/**
 * @author Jozef Liška <jfox@jfox.sk>
 */
class MessageFacade {

    /*
     * @var MessageRepository
     */
	private $messageRepository;

    /*
     * @var EntityManager
     */
    private $entityManager;

	public function __construct(MessageRepository $messageRepository, EntityManager $entityManager) {
		$this->messageRepository = $messageRepository;
		$this->entityManager = $entityManager;
	}

    public function saveMessage(Message $mmessage)
    {
        $this->entityManager->persist($mmessage);
        $this->entityManager->flush([$mmessage]);
    }
}
