<?php

namespace App\Database\Repository;

use App\Domain\Repository\IUserRepository;
use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository implements IUserRepository
{
    public function findByName(string $name): ?object
    {
        return $this->findOneBy(["name" => $name]);
    }
}
