<?php

declare(strict_types=1);

namespace App\Router;

use App\Controller\PlayerController;
use App\Controller\TeamController;
use FastRoute\RouteCollector;

class Routes
{
    public function setRoutes(RouteCollector &$r): void
    {
        $r->get('', [TeamController::class, 'index']);

        $r->addGroup('/team', function (RouteCollector $r) {
            $r->post('', [TeamController::class, 'store']);
            $r->get('', [TeamController::class, 'index']);
            $r->get('/create', [TeamController::class, 'create']);
            $r->get('/{id:\d+}', [TeamController::class, 'show']);
        });

        $r->addGroup('/team/{teamId:\d+}/player', function (RouteCollector $r) {
            $r->get('/create', [PlayerController::class, 'create']);
            $r->post('', [PlayerController::class, 'store']);
        });
    }
}