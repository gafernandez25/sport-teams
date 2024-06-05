<?php

declare(strict_types=1);

namespace App\Router;

use App\Controller\TeamController;
use FastRoute\RouteCollector;

class Routes
{
    public function setRoutes(RouteCollector &$r): void
    {
        $r->addGroup('/api', function (RouteCollector $r) {
            $r->post('/test/{id:\d+}[/{title}]', [TeamController::class, 'index']);
        });
    }
}