<?php

namespace App\Database\Fixture;

use App\Domain\Entity\Ticket;
use App\Domain\Entity\User;
use App\Domain\Repository\IUserRepository;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Lorem;

class TicketListFixture implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        /** @var IUserRepository $userRepository */
        $userRepository = $manager->getRepository(User::class);
        $user = $userRepository->findByName("Lucas");

        for ($i = 0; $i < 10; $i++) {
            $ticket = new Ticket();
            $ticket->setDescription(join("\n\n", Lorem::paragraphs()));
            $ticket->setStatus("open");
            $ticket->setTitle(Lorem::sentence(5));
            $ticket->setUser($user);

            $manager->persist($ticket);
        }

        $manager->flush();
    }
}
