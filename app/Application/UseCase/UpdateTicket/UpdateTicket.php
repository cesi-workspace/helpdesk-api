<?php

namespace App\Application\UseCase\UpdateTicket;

use App\Domain\Service\ITicketService;
use Kernel\App;
use Kernel\Layer\Domain\UseCase;
use Kernel\Layer\Presentation\Presenter;

class UpdateTicket implements UseCase
{
    /**
     * @param UpdateTicketRequest $request
     * @param Presenter $output
     */
    public function execute($request, Presenter $output)
    {
        $ticketService = App::getContainer()->get(ITicketService::class);
        $ticket = $ticketService->updateTicket($request->getId(), $request->getUpdatedTicket());

        $updateTicketResponse = new UpdateTicketResponse($ticket != null ? 200 : 400, $ticket);
        $output->present($updateTicketResponse);
    }
}
