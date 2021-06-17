<?php

namespace App\Application\UseCase\DeleteTicket;

class DeleteTicketRequest
{
    private int $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}