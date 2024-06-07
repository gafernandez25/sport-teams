<?php

namespace App\Repository;

use App\Model\Sport;
use Illuminate\Database\Eloquent\Collection;

interface SportRepositoryInterface
{
    /**
     * @return Collection<int, Sport>
     */
    public function getAll(): Collection;
}