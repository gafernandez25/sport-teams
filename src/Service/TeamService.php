<?php

declare(strict_types=1);

namespace App\Service;

use App\Model\Player;
use App\Model\Team;
use App\Repository\TeamRepositoryInterface;
use App\Request\StoreTeamRequest;

class TeamService
{
    public function __construct(private readonly TeamRepositoryInterface $teamRepository)
    {
    }

    public function createTeamFromStoreRequest(StoreTeamRequest $request): Team
    {
        $team = new Team();

        $team->name = $request->name;
        $team->city = $request->city;
        $team->sport_id = $request->sportId;
        $team->foundation_date = $request->foundationDate?->format('Y-m-d');

        return $team;
    }

    public function cleanCaptain(Team $team): bool
    {
        $team->captain_id = null;

        return $this->teamRepository->save($team);
    }

    public function updateCaptain(Team $team, Player $player): bool
    {
        $team->captain_id = $player->id;

        return $this->teamRepository->save($team);
    }
}