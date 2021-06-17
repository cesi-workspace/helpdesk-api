<?php

namespace App\Domain\Repository;

interface ITicketRepository
{
    public function fetchAll(int $limit): array;
}
