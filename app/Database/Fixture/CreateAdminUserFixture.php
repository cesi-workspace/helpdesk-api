<?php

namespace App\Database\Fixture;

use App\Domain\Entity\User;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Lorem;

class CreateAdminUserFixture implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setName("Lucas");
        $user->setPassword("10c25665e49274c39b8e8f7ad6e2a3d0b0bc5052");
        $user->setRank(1);

        $manager->persist($user);
        $manager->flush();
    }
}
