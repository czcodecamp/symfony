<?php

namespace AppBundle\Facade;

use AppBundle\Repository\ContactRepository;
use Doctrine\ORM\EntityManager;

class ContactFacade {

	private $contactRepository;
	private $entityManager;

	public function __construct(
		ContactRepository $contactRepository,
		EntityManager $entityManager
	) {
		$this->contactRepository = $contactRepository;
		$this->entityManager = $entityManager;
	}

	public function setNewContactMessage($contact) {
		$this->entityManager->persist($contact);
		$this->entityManager->flush([$contact]);
		return $contact;
	}


}