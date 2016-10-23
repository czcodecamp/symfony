<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @author Vašek Boch <vasek.boch@live.com>
 * @author Jan Klat <jenik@klatys.cz>
 * @ORM\Entity
 * @UniqueEntity(fields="username", message="Tento e-mail je již registrován")
 */
class User implements UserInterface
{
    
    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    
    /**
     * @ORM\Column(type="string", length=255, unique=true, name="email")
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $username;
    
    /**
     * @ORM\Column(type="string", length=64)
     */
    private $password;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true, name="name")
     */
    private $name;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true, name="surname")
     */
    private $surname;
    
    /**
     * @ORM\Column(type="string", length=15, nullable=true, name="phone")
     */
    private $phone;
    
    /**
     * @var string
     * @ORM\Column(name="street", type="string", nullable=true, length=255)
     */
    private $street;
    
    /**
     * @var string
     * @ORM\Column(name="city", type="string", nullable=true, length=255)
     */
    private $city;
    
    /**
     * @var string
     * @ORM\Column(name="zipcode", type="string", nullable=true, length=255)
     */
    private $zipcode;
    
    /**
     * @Assert\NotBlank()
     * @Assert\Length(max=4096)
     */
    private $plainPassword;
    
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @param int $id
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;
        
        return $this;
    }
    
    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }
    
    /**
     * @param mixed $username
     * @return self
     */
    public function setUsername($username)
    {
        $this->username = $username;
        
        return $this;
    }
    
    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }
    
    /**
     * @param mixed $phone
     * @return self
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        
        return $this;
    }
    
    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }
    
    /**
     * @param mixed $password
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = $password;
        
        return $this;
    }
    
    /**
     * @return mixed
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }
    
    /**
     * @param mixed $plainPassword
     * @return self
     */
    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;
        
        return $this;
    }
    
    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * @param mixed $name
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
        
        return $this;
    }
    
    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }
    
    /**
     * @param mixed $surname
     * @return self
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
        
        return $this;
    }
    
    /**
     * Set street
     *
     * @param string $street
     * @return Address
     */
    public function setStreet($street)
    {
        $this->street = $street;
        
        return $this;
    }
    
    /**
     * Get street
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }
    
    /**
     * Set city
     *
     * @param string $city
     * @return Address
     */
    public function setCity($city)
    {
        $this->city = $city;
        
        return $this;
    }
    
    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }
    
    /**
     * Set zipcode
     *
     * @param string $zipcode
     * @return Address
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;
        
        return $this;
    }
    
    /**
     * Get zipcode
     *
     * @return string
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }
    
    public function getRoles()
    {
        return [];
    }
    
    public function getSalt()
    {
        return null;
    }
    
    public function eraseCredentials()
    {
        //nothing to do
        return;
    }
    
}
