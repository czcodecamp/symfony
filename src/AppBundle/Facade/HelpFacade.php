<?php
namespace AppBundle\Facade;


use AppBundle\Entity\SupportTicket;
use Doctrine\ORM\EntityManager;

/**
 * @author Vašek Boch <vasek.boch@live.com>
 * @author Jan Klat <jenik@klatys.cz>
 */
class HelpFacade
{
	private $entityManager;

	public function __construct(EntityManager $entityManager)
	{
		$this->entityManager = $entityManager;
	}

	/**
	 * @param SupportTicket $contactFormTicket
	 */
	public function saveSupportTicket(SupportTicket $contactFormTicket)
	{
		$this->entityManager->persist($contactFormTicket);
		$this->entityManager->flush([$contactFormTicket]);
	}

}
