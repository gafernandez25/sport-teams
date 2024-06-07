<?php

declare(strict_types=1);

namespace App\Repository;

use App\Model\Player;
use Illuminate\Database\Eloquent\Model;

interface PlayerRepositoryInterface
{
    public function save(Player $player): bool;

    /**
     * @return ?Player
     */
    public function getById(int $id): ?Model;
}