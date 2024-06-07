<?php

declare(strict_types=1);

namespace App\Repository;

use App\Model\Team;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface TeamRepositoryInterface
{
    public function save(Team $team): bool;

    /**
     * @return Collection<int, Team>
     */
    public function getAll(): Collection;

    /**
     * @return ?Team
     */
    public function getById(int $id): ?Model;
}