<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ContactRepository")
 */
class Contact {

        /**
         * @var int
         * @ORM\Id
         * @ORM\GeneratedValue
         * @ORM\Column(type="integer")
         */
        private $id;

        /**
         * @var string
         * @ORM\Column(type="string")
         */
        private $email;

        /**
         * @var string
         * @ORM\Column(type="string", length=64)
         */
        private $firstName;
        
        /**
         * @var string
         * @ORM\Column(type="string", length=64)
         */
        private $surname;
        
        /**
         * @var string
         * @ORM\Column(type="string", length=65535)
         */
        private $query;
        
        /**
         * @return int
         */
        public function getId() {
                return $this->id;
        }

        /**
         * @param int $id
         * @return self
         */
        public function setId($id) {
                $this->id = $id;
                return $this;
        }

        /**
         * @return string
         */
        public function getEmail() {
                return $this->email;
        }

        /**
         * @param string $email
         * @return self
         */
        public function setEmail($email) {
                $this->email = $email;
                return $this;
        }

        /**
         * @return string
         */
        public function getFirstName() {
                return $this->firstName;
        }

        /**
         * @param string $firstName
         * @return self
         */
        public function setFirstName($firstName) {
                $this->firstName = $firstName;
                return $this;
        }
        
        /**
         * @return string
         */
        public function getSurname() {
                return $this->surname;
        }

        /**
         * @param string $surname
         * @return self
         */
        public function setSurname($surname) {
                $this->surname = $surname;
                return $this;
        }
        
        /**
         * @return string
         */
        public function getQuery() {
                return $this->query;
        }

        /**
         * @param string $query
         * @return self
         */
        public function setQuery($query) {
                $this->query = $query;
                return $this;
        }        
}
