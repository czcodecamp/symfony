<?php

namespace AppBundle\Facade;

use AppBundle\Entity\Faq;
use AppBundle\Repository\FaqRepository;

/**
 * @author Jozef Liška <jfox@jfox.sk>
 */
class FaqFacade {

    /*
     * @var FaqRepository
     */
	private $faqRepository;

	public function __construct(FaqRepository $faqRepository) {
		$this->faqRepository = $faqRepository;
	}

	public function getAll() {
		return $this->faqRepository->findAll();
	}
}
