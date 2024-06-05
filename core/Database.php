<?php

declare(strict_types=1);

namespace Core;

use Illuminate\Database\Capsule\Manager as Capsule;

class Database
{
    private const PARAMS = [
        'driver' => 'mysql',
        'host' => 'duacode-db',
        'database' => 'duacode',
        'username' => 'root',
        'password' => '1234',
//        'charset' => 'utf8',
//        'collation' => 'utf8mb4_unicode_ci',
//        'prefix' => '',
    ];

    public static function setDatabaseConnection(): void
    {
        $capsule = new Capsule();

        $capsule->addConnection(self::PARAMS);

        $capsule->setAsGlobal();

        $capsule->bootEloquent();
    }

//    private static self $instance;
//
//    private function __construct()
//    {
//        (new Capsule())->addConnection(self::PARAMS);
//    }

//    public static function getInstance(): self
//    {
//        if (!self::$instance) {
//            self::$instance = new self();
//        }
//        return self::$instance;
//    }
}