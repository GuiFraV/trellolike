<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Task;
use Faker\Generator;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{

    /**
     * @var Generator
     */
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {

        for($i=0; $i < 50; $i++){

            $task = new Task();
            $task->setTitle($this->faker->word())
                 ->setContent($this->faker->sentence());

            $manager->persist($task);
        }

        $manager->flush();
    }
}
