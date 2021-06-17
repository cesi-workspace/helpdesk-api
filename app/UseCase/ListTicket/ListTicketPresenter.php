<?php

namespace App\UseCase\ListTicket;

use Kernel\Layer\Presentation\Presenter;
use Kernel\Layer\Presentation\ViewModel;

class ListTicketPresenter implements Presenter
{

    private array $tickets;
    private int $status;

    /**
     * @param ListTicketResponse $response
     */
    public function present($response)
    {
        $this->tickets = $response->getTickets();
        $this->status = $response->getStatus();
    }

    public function viewModel(): ViewModel
    {
        return new ViewModel($this->tickets, $this->status);
    }
}
