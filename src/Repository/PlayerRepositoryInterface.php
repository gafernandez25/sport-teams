<?php

declare(strict_types=1);

namespace App\Repository;

use App\Model\Player;

interface PlayerRepositoryInterface
{
    public function save(Player $player): bool;
}