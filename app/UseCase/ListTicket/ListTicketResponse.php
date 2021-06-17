<?php

namespace App\UseCase\ListTicket;

class ListTicketResponse
{
    private array $tickets;
    private int $status;

    public function __construct(array $tickets, int $status)
    {
        $this->tickets = $tickets;
        $this->status = $status;
    }

    /**
     * @return array
     */
    public function getTickets(): array
    {
        return $this->tickets;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }
}
