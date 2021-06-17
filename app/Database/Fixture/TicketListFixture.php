<?php

namespace App\Database\Fixture;

use App\Entity\Ticket;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Lorem;

class TicketListFixture implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 10; $i++) {
            $ticket = new Ticket();
            $ticket->setDescription(join("\n\n", Lorem::paragraphs()));
            $ticket->setStatus("open");
            $ticket->setTitle(Lorem::sentence(5));

            $manager->persist($ticket);
        }

        $manager->flush();
    }
}
