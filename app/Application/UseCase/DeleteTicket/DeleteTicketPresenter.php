<?php

namespace App\Application\UseCase\DeleteTicket;

use Kernel\Layer\Presentation\Presenter;
use Kernel\Layer\Presentation\ViewModel;

class DeleteTicketPresenter implements Presenter
{
    private int $status;

    public function present(mixed $response)
    {
        $this->status = $response->getStatus();
    }

    public function viewModel(): ViewModel
    {
        return new ViewModel("", $this->status);
    }
}
