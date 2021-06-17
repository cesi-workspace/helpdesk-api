<?php

namespace App\Domain\Service;

interface ITicketService
{
    public function getLastTickets(int $limit);
    public function getTicketById(int $id);
    public function deleteTicket(int $id);
    public function updateTicket(int $id, mixed $ticket);
}
