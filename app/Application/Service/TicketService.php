<?php

namespace App\Application\Service;

use App\Database\Repository\TicketRepository;
use App\Domain\Entity\Ticket;
use App\Domain\Service\ITicketService;
use Doctrine\ORM\EntityManager;
use Kernel\App;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class TicketService implements ITicketService
{
    public function getLastTickets(int $limit)
    {
        $container = App::getContainer();
        $entityManager = $container->get(EntityManager::class);
        $ticketRepository = $entityManager->getRepository(Ticket::class);

        $serializer = new Serializer([new ObjectNormalizer()], [new JsonEncoder()]);
        return json_decode($serializer->serialize($ticketRepository->fetchAll($limit), 'json'));
    }

    public function getTicketById(int $id)
    {
        $container = App::getContainer();
        $entityManager = $container->get(EntityManager::class);
        /** @var TicketRepository $ticketRepository */
        $ticketRepository = $entityManager->getRepository(Ticket::class);

        $serializer = new Serializer([new ObjectNormalizer()], [new JsonEncoder()]);

        return json_decode($serializer->serialize($ticketRepository->findOneBy(['id' => $id]), 'json'));
    }

    public function deleteTicket(int $id): bool
    {
        $container = App::getContainer();
        $entityManager = $container->get(EntityManager::class);
        /** @var TicketRepository $ticketRepository */
        $ticketRepository = $entityManager->getRepository(Ticket::class);
        return $ticketRepository->delete($id);
    }

    public function updateTicket(int $id, mixed $ticket)
    {
        $container = App::getContainer();
        $entityManager = $container->get(EntityManager::class);
        /** @var TicketRepository $ticketRepository */
        $ticketRepository = $entityManager->getRepository(Ticket::class);
        /** @var Ticket $ticketEntity */
        $ticketEntity = $ticketRepository->findOneBy(["id" => $id]);

        if ($ticketEntity == null) {
            return null;
        }

        if (isset($ticket->title)) {
            $ticketEntity->setTitle($ticket->title);
        }

        if (isset($ticket->description)) {
            $ticketEntity->setDescription($ticket->description);
        }

        $entityManager->persist($ticketEntity);
        $entityManager->flush();

        $serializer = new Serializer([new ObjectNormalizer()], [new JsonEncoder()]);
        return json_decode($serializer->serialize($ticketEntity, 'json'));
    }
}
