<?php

namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\String\Slugger\SluggerInterface;
use Faker;

class UsersFixtures extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $passwordEncoder,
        private SluggerInterface $slugger
    ){}

    public function load(ObjectManager $manager): void
    {
        // FRED
        $admin = new Users();
        $admin->setEmail('webdev@info.fr');
        $admin->setLastname('Gauthier');
        $admin->setFirstname('Fred');
        $admin->setPassword(
            $this->passwordEncoder->hashPassword($admin, 'admin')
        );
        $admin->setRoles(['ROLE_ADMIN']);

        $manager->persist($admin);

        // ALEXIS
        $admin = new Users();
        $admin->setEmail('alexis@info.fr');
        $admin->setLastname('Bonnet');
        $admin->setFirstname('Alexis');
        $admin->setPassword(
            $this->passwordEncoder->hashPassword($admin, '7777777')
        );
        $admin->setRoles(['ROLE_ADMIN']);

        $manager->persist($admin);

        $manager->flush();
    }
}