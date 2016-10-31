<?php

namespace AppBundle\Facade;

use AppBundle\Entity\Contact;
use AppBundle\Repository\ContactRepository;
/**
 * @author Aleš Kůdela
 */
class ContactFacade {

        private $contactRepository;

        public function __construct(ContactRepository $contactRepository) {
                $this->contactRepository = $contactRepository;
        }

}
