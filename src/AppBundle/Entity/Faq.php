<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FaqRepository")
 */
class Faq {

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
        private $question;

        /**
         * @var string
         * @ORM\Column(type="string", length=65535)
         */
        private $reply;

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
        public function getQuestion() {
                return $this->question;
        }

        /**
         * @param string $question
         * @return self
         */
        public function setQuestion($question) {
                $this->question = $question;
                return $this;
        }

        /**
         * @return string
         */
        public function getReply() {
                return $this->reply;
        }

        /**
         * @param string $reply
         * @return self
         */
        public function setReply($reply) {
                $this->reply = $reply;
                return $this;
        }

}
