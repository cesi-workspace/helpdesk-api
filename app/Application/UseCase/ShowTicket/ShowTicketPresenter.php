<?php

namespace App\Application\UseCase\ShowTicket;

use Kernel\Layer\Presentation\Presenter;
use Kernel\Layer\Presentation\ViewModel;

class ShowTicketPresenter implements Presenter
{

    private mixed $ticket;
    private int $status;

    /**
     * @param ShowTicketResponse $response
     */
    public function present($response)
    {
        $this->ticket = $response->getTicket();
        $this->status = $response->getStatus();
    }

    public function viewModel(): ViewModel
    {
        return new ViewModel($this->ticket, $this->status);
    }
}
