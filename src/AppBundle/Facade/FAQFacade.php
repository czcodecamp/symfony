<?php

namespace AppBundle\Facade;

use AppBundle\Repository\FAQRepository;


class FAQFacade
{
    private $faqRepository;

    public function __construct(FAQRepository $faqRepository) {
        $this->faqRepository = $faqRepository;
    }

    public function getAll() {
        return $this->faqRepository->findBy([]);
    }

}