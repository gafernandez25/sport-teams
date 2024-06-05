<?php

declare(strict_types=1);

namespace App\Validator;

use MadeSimple\Validator\Validator;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

abstract class AbstractValidator
{
    public function __construct(private readonly Validator $validator)
    {
    }

    protected function validate(array $params, array $rules): void
    {
        $this->validator->validate($params, $rules);

        if ($this->validator->hasErrors()) {
            $response = new JsonResponse(
                data: $this->validator->getProcessedErrors(),
                status: Response::HTTP_UNPROCESSABLE_ENTITY
            );

            $response->send();
            die;
        }
    }
}