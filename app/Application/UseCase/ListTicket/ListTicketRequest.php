<?php

namespace App\Application\UseCase\ListTicket;

class ListTicketRequest
{
    private int $limit;

    public function __construct($limit)
    {
        $this->limit = $limit;
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }
}
