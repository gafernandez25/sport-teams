<?php

declare(strict_types=1);

namespace App\Exception;

use FastRoute\BadRouteException;

class MethodNotAllowedException extends BadRouteException
{
    protected $message = 'Method not allowed';
}