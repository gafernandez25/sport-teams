<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\TeamRepositoryInterface;
use App\Service\TeamService;
use App\Validator\StoreTeamRequestValidator;
use Core\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TeamController extends AbstractController
{
    public function __construct(
        private readonly StoreTeamRequestValidator $storeTeamRequestValidator,
        private readonly TeamRepositoryInterface $teamRepository,
        private readonly TeamService $teamService,
    ) {
    }

    public function index(): View
    {
        return View::make('team/index');
    }

    public function store(Request $request): Response
    {
        $storeRequest = $this->storeTeamRequestValidator->validateRequest($request);

        $team = $this->teamService->createTeamFromStoreRequest($storeRequest);

        $this->teamRepository->save($team);

        return $this->createJsonResponse(status: Response::HTTP_CREATED);
    }
}