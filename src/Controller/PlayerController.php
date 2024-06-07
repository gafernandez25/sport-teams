<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\TeamRepositoryInterface;
use App\Service\PlayerService;
use App\Validator\StorePlayerRequestValidator;
use Core\View;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class PlayerController extends AbstractController
{
    public function __construct(
        private readonly TeamRepositoryInterface $teamRepository,
        private readonly StorePlayerRequestValidator $storePlayerRequestValidator,
        private readonly PlayerService $playerService,
    ) {
    }

    public function create(int $teamId): View
    {
        $team = $this->teamRepository->getById($teamId);

        return View::make('player/create', ['team' => $team]);
    }

    public function store(Request $request, int $teamId): RedirectResponse
    {
        $storePlayerRequest = $this->storePlayerRequestValidator->validateRequest($request);

        $team = $this->teamRepository->getById($teamId);

        $this->playerService->createTeamPlayerFromRequest($storePlayerRequest, $team);

        return new RedirectResponse(
            url: '/team/' . $team->id
        );
    }

//    public function edit(int $id): View
//    {
//    }
//
//    public function update(Request $request, int $id): RedirectResponse
//    {
//    }
//
//    public function delete(int $id): JsonResponse
//    {
//    }
}