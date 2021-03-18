<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;
    private $roles = [];

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();

        $user->setEmail('leliam@live.fr');

        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
        "admin"
        ));

        $this->roles[] = 'ROLE_ADMIN';
        $user->setRoles($this->roles);

        $manager->persist($user);
        $manager->flush();
    }
}