<?php

namespace App\Application\UseCase\ShowTicket;

class ShowTicketResponse
{
    private mixed $ticket;
    private int $status;

    public function __construct(mixed $ticket, int $status)
    {
        $this->ticket = $ticket;
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getTicket(): mixed
    {
        return $this->ticket;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }
}
