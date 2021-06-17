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

    public function delete(int $id): bool
    {
        $queryBuilder = $this
            ->createQueryBuilder('ticket')
            ->delete()
            ->where("ticket.id = :id")
            ->setParameter("id", $id);

        return $queryBuilder->getQuery()->execute();
    }
}
