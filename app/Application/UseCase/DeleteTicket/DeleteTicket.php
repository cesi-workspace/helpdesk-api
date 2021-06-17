<?php

namespace App\Application\UseCase\DeleteTicket;

use App\Domain\Service\ITicketService;
use Kernel\App;
use Kernel\Layer\Domain\UseCase;
use Kernel\Layer\Presentation\Presenter;

class DeleteTicket implements UseCase
{
    public function execute($request, Presenter $output)
    {
        $ticketService = App::getContainer()->get(ITicketService::class);
        $status = $ticketService->deleteTicket($request->getId()) ? 200 : 400;

        $deleteTicketResponse = new DeleteTicketResponse($status);
        $output->present($deleteTicketResponse);
    }
}
