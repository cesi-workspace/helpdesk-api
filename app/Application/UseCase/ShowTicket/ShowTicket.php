<?php

namespace App\Application\UseCase\ShowTicket;

use App\Database\Repository\TicketRepository;
use App\Domain\Entity\Ticket;
use App\Domain\Service\ITicketService;
use Doctrine\ORM\EntityManager;
use Kernel\App;
use Kernel\Layer\Domain\UseCase;
use Kernel\Layer\Presentation\Presenter;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ShowTicket implements UseCase
{
    /**
     * @param ShowTicketRequest $request
     * @param Presenter $output
     */
    public function execute($request, Presenter $output)
    {
        /** @var ITicketService $ticketService */
        $ticketService = App::getContainer()->get(ITicketService::class);

        $listTicketResponse = new ShowTicketResponse($ticketService->getTicketById($request->getId()), 200);
        $output->present($listTicketResponse);
    }
}
