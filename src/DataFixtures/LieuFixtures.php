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
        for($i=1;i<11;i++){
            $lieu= new Lieu();
            $lieu->
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
