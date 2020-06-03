<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordHasher;

    public function __construct(UserPasswordEncoderInterface $passwordHasher) 
    {
        $this->passwordHasher = $passwordHasher;
    }
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        // Je créé un User 'Fictif' avec role admin
        $user = new User();
        $user->setEmail('wick@wick.fr');
        $user->setRoles(['ROLE_USER']);
        $user->setNom('Wick');
        $user->setPrenom('John');
        $user->setRue('Matrice');
        $user->setCodePostal('13000');
        $user->setVille('Marseille');
        $user->setTelephone('06 00 00 00 13');
        // Je hashe le mot de passe
        $user->setPassword($this->passwordHasher->encodePassword(
            $user,
            'wick'
        ));
        $manager->persist($user);
        $manager->flush();
    }
}
