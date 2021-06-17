<?php

namespace App\Application\UseCase\ListTicket;

use App\Domain\Service\ITicketService;
use Kernel\App;
use Kernel\Layer\Domain\UseCase;
use Kernel\Layer\Presentation\Presenter;

class ListTicket implements UseCase
{
    public function execute($request, Presenter $output)
    {
        $ticketService = App::getContainer()->get(ITicketService::class);

        $listTicketResponse = new ListTicketResponse($ticketService->getLastTickets($request->getLimit()), 200);
        $output->present($listTicketResponse);
    }
}
