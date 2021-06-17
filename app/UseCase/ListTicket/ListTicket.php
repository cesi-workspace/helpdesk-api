<?php

namespace App\UseCase\ListTicket;

use App\Domain\Entity\Ticket;
use Doctrine\ORM\EntityManager;
use Kernel\App;
use Kernel\Layer\Domain\UseCase;
use Kernel\Layer\Presentation\Presenter;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ListTicket implements UseCase
{
    public function execute($request, Presenter $output)
    {
        $container = App::getContainer();
        $entityManager = $container->get(EntityManager::class);
        $ticketRepository = $entityManager->getRepository(Ticket::class);


        $serializer = new Serializer([new ObjectNormalizer()], [new JsonEncoder()]);
        $json = json_decode($serializer->serialize($ticketRepository->fetchAll($request->getLimit()), 'json'));

        $listTicketResponse = new ListTicketResponse($json, 200);
        $output->present($listTicketResponse);
    }
}
