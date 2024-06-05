<?php

declare(strict_types=1);

namespace App\Trait;

use Symfony\Component\HttpFoundation\JsonResponse;

trait ResponseTrait
{
    protected function createJsonResponse(
        mixed $data = null,
        int $status = 200,
        array $headers = [],
        bool $json = false
    ): JsonResponse {
        return new JsonResponse($data, $status, $headers, $json);
    }
}