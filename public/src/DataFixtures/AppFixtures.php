<?php

namespace App\DataFixtures;

use App\Entity\Personne;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 1; $i <= 10; $i++) {
            $personne = new Personne();
            $personne->setFirstname($faker->firstName);
            $personne->setLastname($faker->lastName);
            $manager->persist($personne);
        }

        $manager->flush();
    }
}
