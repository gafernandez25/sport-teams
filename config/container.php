<?php

/**
 * Dependency Injection Container interface bindings
 * https://php-di.org/
 */
return [
    'App\Repository\*RepositoryInterface' => DI\autowire('App\Repository\*RepositoryEloquent'),
];