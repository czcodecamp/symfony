<?php

namespace AppBundle\Service;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;

/**
 * @author Vašek Boch <vasek.boch@live.com>
 * @author Jan Klat <jenik@klatys.cz>
 */
class UserModel
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
	// 3) Encode the password (you could also do this via Doctrine listener)
	$user->setPassword(
		$this->passwordEncoder->encodePassword($user->getPlainPassword(), null)
	);

	// 4) save the User!
	$this->entityManager->persist($user);
	$this->entityManager->flush();

	// ... do any other work - like sending them an email, etc
	// maybe set a "flash" success message for the user
    }

}
