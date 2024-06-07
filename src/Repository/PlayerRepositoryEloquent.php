<?php

declare(strict_types=1);

namespace App\Repository;

use App\Model\Player;
use Illuminate\Database\Eloquent\Model;

class PlayerRepositoryEloquent implements PlayerRepositoryInterface
{
    public function save(Player $player): bool
    {
        return $player->save();
    }

    public function getById(int $id): ?Model
    {
        return Player::query()->find($id);
    }
}