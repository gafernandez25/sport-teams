<?php

declare(strict_types=1);

namespace App\Router;

use App\Controller\TeamController;
use FastRoute\RouteCollector;

class Routes
{
    public function setRoutes(RouteCollector &$r): void
    {
        $r->addGroup('/team', function (RouteCollector $r) {
            $r->post('', [TeamController::class, 'store']);
            $r->get('', [TeamController::class, 'index']);
//            $r->get('/{id:\d+}', [TeamController::class, 'show']);
        });
    }
}