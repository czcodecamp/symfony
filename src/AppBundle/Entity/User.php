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
	 * @Assert\NotBlank()
	 * @Assert\Length(max=4096)
	 */
	private $plainPassword;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $name = '';

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $surname = '';

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $street = '';

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $city = '';

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $zip = '';

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $phone = '';

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
     * @return mixed
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param mixed $street
     * @return self
     */
    public function setStreet($street)
    {
        $this->street = $street;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     * @return self
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * @param mixed $zip
     * @return self
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
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

}
