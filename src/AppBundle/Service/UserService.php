<?php

namespace AppBundle\Service;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;

/**
 * @author Vašek Boch <vasek.boch@live.com>
 * @author Jan Klat <jenik@klatys.cz>
 */
class UserService
{

    private $entityManager;
    private $passwordEncoder;

    public function __construct(EntityManager $entityManager, PasswordEncoderInterface $passwordEncoder)
    {
	$this->entityManager = $entityManager;
	$this->passwordEncoder = $passwordEncoder;
    }

    public function registerUser($user)
    {
	$user->setPassword(
		$this->passwordEncoder->encodePassword($user->getPlainPassword(), null)
	);

	$this->saveUser($user);

	// ... do any other work - like sending them an email, etc
	// maybe set a "flash" success message for the user
    }
    
    public function saveUser($user){
	$this->entityManager->persist($user);
	$this->entityManager->flush();
    }

}
