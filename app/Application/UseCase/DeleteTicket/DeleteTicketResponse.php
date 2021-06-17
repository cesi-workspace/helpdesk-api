<?php

namespace App\Application\UseCase\DeleteTicket;

class DeleteTicketResponse
{
    private int $status;

    public function __construct(int $status)
    {
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }
}
