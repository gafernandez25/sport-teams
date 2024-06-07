<?php

declare(strict_types=1);

namespace Core;

use Dotenv\Dotenv;
use Illuminate\Database\Capsule\Manager as Capsule;

class Database
{
    public static function setDatabaseConnection(): void
    {
        $dotenv = Dotenv::createImmutable(dirname(__DIR__, 1));
        $dotenv->load();

        $params = [
            'driver' => $_ENV['DB_CONNECTION'],
            'host' => $_ENV['DB_HOST'],
            'database' => $_ENV['DB_DATABASE'],
            'username' => $_ENV['DB_USERNAME'],
            'password' => $_ENV['DB_PASSWORD'],
        ];

        $capsule = new Capsule();

        $capsule->addConnection($params);

        $capsule->setAsGlobal();

        $capsule->bootEloquent();
    }
}