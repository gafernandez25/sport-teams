<?php

declare(strict_types=1);

namespace App\Repository;

use App\Model\Team;
use Illuminate\Database\Eloquent\Collection;

interface TeamRepositoryInterface
{
    public function save(Team $team): bool;

    /**
     * @return Collection<int, Team>
     */
    public function getTeams(): Collection;
}