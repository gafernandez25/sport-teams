<?php

/**
 * Dependency Injection Container interface bindings
 * https://php-di.org/
 */
return [
    'App\Repository\TeamRepositoryInterface' => DI\autowire('App\Repository\TeamRepositoryEloquent'),
];