<?php

namespace AppBundle\Facade;

use AppBundle\Entity\Faq;
use AppBundle\Repository\FaqRepository;

class FaqFacade
{

    private $faqRepository;

    public function __construct(FaqRepository $faqRepository)
    {
	$this->faqRepository = $faqRepository;
    }

    public function getAll()
    {
	return $this->faqRepository->findBy(
			[], [
		    "question" => "asc"
			]
	);
    }

}
