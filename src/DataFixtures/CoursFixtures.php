<?php

namespace App\DataFixtures;

use App\Entity\Cours;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class CoursFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i=0;$i<15;$i++)
        {
            $faker= Factory::create("fr_FR");
            $cours=new Cours();
            $cours ->setNom("Cours $i");
            $cours->setDescription($faker->paragraph);
            $cours-> setSemestre("Semestre inconnu");
            $cours->setECTS(mt_rand(2,8));
            $manager->persist($cours);
        }
        $manager->flush();
    }
}
