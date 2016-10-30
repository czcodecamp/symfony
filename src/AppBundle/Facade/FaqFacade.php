<?php

namespace AppBundle\Facade;

use AppBundle\Entity\Faq;
use AppBundle\Repository\FaqRepository;

/**
 * @author Vašek Boch <vasek.boch@live.com>
 * @author Jan Klat <jenik@klatys.cz>
 */
class FaqFacade {

	private $faqRepository;

	public function __construct(FaqRepository $faqRepository) {
		$this->faqRepository = $faqRepository;
	}

	public function getAll($limit, $offset) {
		return $this->faqRepository->findBy(
			[],
			[
				"id" => "desc"
			],
			$limit,
			$offset
		);
	}

	public function countAll() {
		return $this->faqRepository->countAll();
	}
}