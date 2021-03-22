<?php

namespace App\DataFixtures;

use App\Entity\Lieu;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class LieuFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker= Factory::create("fr_FR");
        for($i=1;$i<11;$i++){
            $lieu= new Lieu();
            $lieu->setNom($faker->country);
            $lieu->setDescription($faker->paragraph);
            $manager->persist($lieu);
        }

        $manager->flush();
    }
}
