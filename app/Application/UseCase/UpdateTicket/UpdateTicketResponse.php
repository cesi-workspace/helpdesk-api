<?php

namespace App\Application\UseCase\UpdateTicket;

class UpdateTicketResponse
{
    private int $status;
    private mixed $ticket;

    public function __construct(int $status, mixed $ticket)
    {
        $this->status = $status;
        $this->ticket = $ticket;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getTicket(): mixed
    {
        return $this->ticket;
    }
}
