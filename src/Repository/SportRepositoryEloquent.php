<?php

declare(strict_types=1);

namespace App\Repository;

use App\Model\Sport;
use Illuminate\Database\Eloquent\Collection;

class SportRepositoryEloquent implements SportRepositoryInterface
{

    public function getAll(): Collection
    {
        return Sport::query()->get();
    }
}