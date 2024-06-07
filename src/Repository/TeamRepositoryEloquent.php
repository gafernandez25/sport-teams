<?php

declare(strict_types=1);

namespace App\Repository;

use App\Model\Team;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class TeamRepositoryEloquent implements TeamRepositoryInterface
{
    public function save(Team $team): bool
    {
        return $team->save();
    }

    public function getAll(): Collection
    {
        return Team::query()->get();
    }

    public function getById(int $id): ?Model
    {
        return Team::query()->find($id);
    }
}