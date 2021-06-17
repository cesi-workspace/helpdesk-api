<?php

namespace App\Application\UseCase\UpdateTicket;

class UpdateTicketRequest
{
    private mixed $updatedTicket;
    private int $id;

    public function __construct(int $id, mixed $updatedTicket)
    {
        $this->id = $id;
        $this->updatedTicket = $updatedTicket;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUpdatedTicket(): mixed
    {
        return $this->updatedTicket;
    }
}
