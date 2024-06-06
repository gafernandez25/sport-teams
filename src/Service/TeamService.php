<?php

declare(strict_types=1);

namespace App\Service;

use App\Model\Team;
use App\Request\StoreTeamRequest;

class TeamService
{
    public function createTeamFromStoreRequest(StoreTeamRequest $request): Team
    {
        $team = new Team();

        $team->name = $request->name;
        $team->city = $request->city;
        $team->sport_id = $request->sportId;
        $team->foundation_date = $request->foundationDate?->format('Y-m-d');

        return $team;
    }
}