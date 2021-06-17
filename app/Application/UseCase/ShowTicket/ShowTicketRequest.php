<?php

namespace App\Application\UseCase\ShowTicket;

class ShowTicketRequest
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
