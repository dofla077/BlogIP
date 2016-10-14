<?php
/**
 * Created by PhpStorm.
 * User: Isma
 * Date: 13/10/2016
 * Time: 11:01
 */

namespace Blog\BadgeBundle\DataFixtures\ORM;


use Blog\BadgeBundle\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class LoadUserData extends AbstractFixture
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for ($i = 1; $i <= 10; $i++) {
            $badge = new User();
            $badge
                ->setFirstname($faker->firstName)
                ->setLastname($faker->lastName)
                ->setEmail($faker->email)
            ;
            $manager->persist($badge);

        }
        $manager->flush();
    }
}