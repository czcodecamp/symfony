<?php

namespace AppBundle\Facade;

use AppBundle\Entity\Faq;
use AppBundle\Repository\FaqRepository;

class FaqFacade {

	private $faqRepository;

	public function __construct(FaqRepository $faqRepository) {
		$this->faqRepository = $faqRepository;
	}

	/** @return Faq[] */
	public function getAllFaqs() {
		return $this->faqRepository->findAll();
	}


}