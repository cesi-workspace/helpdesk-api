<?php

namespace App\Application\UseCase\UpdateTicket;

use Kernel\Layer\Presentation\Presenter;
use Kernel\Layer\Presentation\ViewModel;

class UpdateTicketPresenter implements Presenter
{
    private int $status;
    private mixed $ticket;

    /**
     * @param UpdateTicketResponse $response
     */
    public function present(mixed $response)
    {
        $this->status = $response->getStatus();
        $this->ticket = $response->getTicket();
    }

    public function viewModel(): ViewModel
    {
        return new ViewModel($this->ticket, $this->status);
    }
}

