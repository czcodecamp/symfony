<?php
namespace AppBundle\Facade;

use AppBundle\Entity\Message;
use AppBundle\Repository\MessageRepository;
use Doctrine\ORM\EntityManager;

/**
 * @author Milan Stanek <mistacms@google.com>
 */
class MessageFacade
{
    
    private $messageRepository;
    private $entityManager;
    
    public function __construct(
        MessageRepository $messageRepository,
        EntityManager $entityManager
    ) {
        $this->messageRepository = $messageRepository;
        $this->entityManager = $entityManager;
    }
    
    
    public function save(Message $mmessage)
    {
        $this->entityManager->persist($mmessage);
        $this->entityManager->flush($mmessage);
    }
    
}