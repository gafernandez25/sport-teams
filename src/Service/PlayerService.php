<?php

declare(strict_types=1);

namespace App\Service;

use App\Model\Player;
use App\Model\Team;
use App\Repository\PlayerRepositoryInterface;
use App\Repository\TeamRepositoryInterface;
use App\Request\StorePlayerRequest;

readonly class PlayerService
{
    public function __construct(
        private PlayerRepositoryInterface $playerRepository,
        private TeamRepositoryInterface $teamRepository,
    ) {
    }

    public function createTeamPlayerFromRequest(StorePlayerRequest $request, Team $team): void
    {
        $player = new Player();

        $player->first_name = $request->firstName;
        $player->last_name = $request->lastName;
        $player->number = $request->number;
        $player->birth_date = $request->birthDate;
        $player->team_id = $team->id;

        $this->playerRepository->save($player);

        if ($request->isCaptain) {
            $team->captain_id = $player->id;

            $this->teamRepository->save($team);
        }
    }

    public function updateTeamPlayerFromRequest(StorePlayerRequest $request, Player $player): void
    {
        $player->first_name = $request->firstName;
        $player->last_name = $request->lastName;
        $player->number = $request->number;
        $player->birth_date = $request->birthDate;

        $this->playerRepository->save($player);

        if ($request->isCaptain) {
            $player->team->captain_id = $player->id;

            $this->teamRepository->save($player->team);
        }
    }
}