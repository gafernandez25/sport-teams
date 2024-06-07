<?php

declare(strict_types=1);

namespace Core;

class Session
{
    public static function set(string $key, mixed $value): void
    {
        $_SESSION[$key] = $value;
    }

    public static function get(string $key): mixed
    {
        return $_SESSION[$key];
    }

    public static function pull(string $key): mixed
    {
        $value = $_SESSION[$key];

        unset($_SESSION[$key]);

        return $value;
    }

    public static function has(string $key): bool
    {
        return isset($_SESSION[$key]);
    }
}