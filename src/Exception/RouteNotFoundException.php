<?php

declare(strict_types=1);

namespace App\Exception;

use FastRoute\BadRouteException;

class RouteNotFoundException extends BadRouteException
{
    protected $message = 'Route not found';
}