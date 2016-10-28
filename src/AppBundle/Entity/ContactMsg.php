<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;

/**
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ContactMsgRepository")
 */
class ContactMsg
{

    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="text")
     */
    private $msg;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="User")
     */
    private $user;

    /**
     * @var datetime
     * @ORM\Column(type="datetime")
     */
    private $sendDate;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $subject;
    
    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $email;
    
    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $name;

    public function __construct()
    {
        $this->sendDate = new DateTime(); 
    }
    
    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
	return $this->id;
    }

    /**
     * Set msg
     *
     * @param string $msg
     *
     * @return ContactMsg
     */
    public function setMsg($msg)
    {
	$this->msg = $msg;

	return $this;
    }

    /**
     * Get msg
     *
     * @return string
     */
    public function getMsg()
    {
	return $this->msg;
    }

    /**
     * Set sendDate
     *
     * @param \DateTime $sendDate
     *
     * @return ContactMsg
     */
    public function setSendDate($sendDate)
    {
	$this->sendDate = $sendDate;

	return $this;
    }

    /**
     * Get sendDate
     *
     * @return \DateTime
     */
    public function getSendDate()
    {
	return $this->sendDate;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return ContactMsg
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
	$this->user = $user;

	return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
	return $this->user;
    }


    /**
     * Set subject
     *
     * @param string $subject
     *
     * @return ContactMsg
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return ContactMsg
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return ContactMsg
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
