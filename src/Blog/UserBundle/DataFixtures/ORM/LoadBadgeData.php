<?php
/**
 * Created by PhpStorm.
 * User: Isma
 * Date: 13/10/2016
 * Time: 11:01
 */

namespace Blog\BadgeBundle\DataFixtures\ORM;


use Blog\BadgeBundle\Entity\Badge;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadBadgeData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
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
            $badge = new Badge();
            $badge
                ->setName($faker->safeColorName)
                ->setDescription($faker->text(50))
                ->setCreatedAt($faker->dateTime)
            ;
            $manager->persist($badge);

        }
        $manager->flush();
    }

    /**
     * Sets the container.
     *
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     */
    public function setContainer(ContainerInterface $container = null)
    {
        // TODO: Implement setContainer() method.
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        // TODO: Implement getOrder() method.
    }
}