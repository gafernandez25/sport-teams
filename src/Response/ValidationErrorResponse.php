<?php

declare(strict_types=1);

namespace App\Response;

use Symfony\Component\HttpFoundation\RedirectResponse;

class ValidationErrorResponse extends RedirectResponse
{
    public static function redirectBack(): void
    {
        (new self(
            url: str_replace($_SERVER['HTTP_ORIGIN'], '', $_SERVER['HTTP_REFERER']),
        ))->send();
    }
}