<?php

namespace App\DataFixtures;

use App\Entity\Cours;
use App\Entity\Enseignant;
use App\Entity\Semestre;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class CoursFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker=Factory::create("fr_FR");
        for($j=0;$j<5;$j++)
        {
            $prof=new Enseignant();
            $prof->setNom($faker->lastName());
            $manager->persist($prof);
            for($i=1;$i<3;$i++)
            {
                for($m=1;$m<3;$m++)
                {
                    $sem= new Semestre();
                    $sem->setformation("Formation $i");
                    $sem->setSemestre("Semestre $j");
                    $manager->persist($sem);
                    for($i=0;$i<4;$i++)
                    {
                        $cours=new Cours();
                        $cours ->setNom($faker->word);
                        $cours->setDescription($faker->paragraph);
                        $cours->setECTS(mt_rand(2,8));
                        $cours->setEnseignant($prof);
                        $cours->setSemestre($sem);
                        $manager->persist($cours);
                    }
                }
            }
        }

        $manager->flush();
    }
}
