<?php

declare(strict_types=1);

namespace App\Repository;

use App\Model\Team;

interface TeamRepositoryInterface
{
    public function save(Team $team): bool;
}