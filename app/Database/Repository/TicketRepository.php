<?php

namespace App\Database\Repository;

use App\Domain\Repository\ITicketRepository;
use Doctrine\ORM\EntityRepository;

class TicketRepository extends EntityRepository implements ITicketRepository
{
    public function fetchAll(int $limit): array
    {
        return $this->findBy([], [], $limit);
    }
}
