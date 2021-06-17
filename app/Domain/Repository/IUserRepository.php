<?php

namespace App\Domain\Repository;

use App\Domain\Entity\User;

interface IUserRepository
{
    public function findByName(string $name);
}
