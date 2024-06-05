<?php

declare(strict_types=1);

namespace App\Repository;

use App\Model\Team;

class TeamRepositoryEloquent implements TeamRepositoryInterface
{
    public function save(Team $team): bool
    {
        return $team->save();
    }
}