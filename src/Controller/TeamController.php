<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\SportRepositoryInterface;
use App\Repository\TeamRepositoryInterface;
use App\Service\TeamService;
use App\Validator\StoreTeamRequestValidator;
use Core\Session;
use Core\View;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TeamController extends AbstractController
{
    public function __construct(
        private readonly StoreTeamRequestValidator $storeTeamRequestValidator,
        private readonly TeamRepositoryInterface $teamRepository,
        private readonly SportRepositoryInterface $sportRepository,
        private readonly TeamService $teamService,
    ) {
    }

    public function index(): View
    {
        $teams = $this->teamRepository->getAll();

        return View::make('team/index', [
            'teams' => $teams,
        ]);
    }

    public function create(): View
    {
        $oldInput = (Session::has('oldInput')) ? Session::pull('oldInput') : null;
        $errorMessages = (Session::has('errorMessages')) ? Session::pull('errorMessages') : null;

        $sports = $this->sportRepository->getAll();

        return View::make('team/create', [
            'sports' => $sports,
            'errorMessages' => $errorMessages,
            'oldInput' => $oldInput,
        ]);
    }

    public function store(Request $request): Response
    {
        $storeRequest = $this->storeTeamRequestValidator->validateRequest($request);

        $team = $this->teamService->createTeamFromStoreRequest($storeRequest);

        $this->teamRepository->save($team);

        return new RedirectResponse('/team');
    }

    public function show(int $id): View
    {
        $team = $this->teamRepository->getById($id);

        return View::make('team/show', ['team' => $team]);
    }
}