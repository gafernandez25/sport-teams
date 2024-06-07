<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\PlayerRepositoryInterface;
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
        private readonly PlayerRepositoryInterface $playerRepository,
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

    public function edit(int $id): View
    {
        $player = $this->playerRepository->getById($id);

        return View::make('player/edit', ['player' => $player]);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $storePlayerRequest = $this->storePlayerRequestValidator->validateRequest($request);

        $player = $this->playerRepository->getById($id);

        $this->playerService->updateTeamPlayerFromRequest($storePlayerRequest, $player);

        return new RedirectResponse(
            url: '/team/' . $player->team_id
        );
    }

//    public function delete(int $id): JsonResponse
//    {
//    }
}