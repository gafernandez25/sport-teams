<?php

declare(strict_types=1);

namespace App\Repository;

use App\Model\Player;

class PlayerRepositoryEloquent implements PlayerRepositoryInterface
{
    public function save(Player $player): bool
    {
        return $player->save();
    }
}