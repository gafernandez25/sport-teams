<?php

declare(strict_types=1);

namespace App\Repository;

use App\Model\Team;
use Illuminate\Database\Eloquent\Collection;

class TeamRepositoryEloquent implements TeamRepositoryInterface
{
    public function save(Team $team): bool
    {
        return $team->save();
    }

    public function getTeams(): Collection
    {
        return Team::query()->get();
    }
}