<?php

namespace AppBundle\Facade;

use AppBundle\Repository\ContactMsgRepository;
use Doctrine\ORM\EntityManager;

class ContactFacade
{

    private $contactMsgRepository;
    private $entityManager;

    public function __construct(ContactMsgRepository $contactMsgRepository, EntityManager $entityManager)
    {
	$this->contactMsgRepository = $contactMsgRepository;
	$this->entityManager = $entityManager;
    }

    public function save($msg)
    {
	$this->entityManager->persist($msg);
	$this->entityManager->flush([$msg]);
    }

}
