<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Team;
use App\Repository\TeamRepositoryInterface;
use App\Validator\IndexTeamRequestValidator;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TeamController extends AbstractController
{
    public function __construct(
        private readonly IndexTeamRequestValidator $indexTeamRequestValidator,
        private readonly TeamRepositoryInterface $teamRepository,
    ) {
    }

    public function store(Request $request): JsonResponse
    {
        $indexRequest = $this->indexTeamRequestValidator->validateRequest($request);

        $team = new Team();

        $team->name = $indexRequest->name;
        $team->city = $indexRequest->city;
        $team->sport_id = $indexRequest->sportId;
        $team->foundation_date = $indexRequest->foundationDate?->format('Y-m-d');

        $this->teamRepository->save($team);

        return $this->createJsonResponse(status: Response::HTTP_CREATED);
    }
}