<?php

declare(strict_types=1);

use Core\Database;
use Core\Kernel;
use Symfony\Component\HttpFoundation\Request;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$request = Request::createFromGlobals();

Database::setDatabaseConnection();

$kernel = new Kernel();

$response = $kernel->handle($request);

$response->send();