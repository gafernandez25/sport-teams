<?php

declare(strict_types=1);

namespace App\Validator;

use Core\Session;
use MadeSimple\Validator\Validator;

abstract class AbstractValidator
{
    protected array $errorMessages = [];

    public function __construct(private readonly Validator $validator)
    {
    }

    protected function validate(array $params, array $rules): bool
    {
        $this->validator->validate($params, $rules);

        if ($this->validator->hasErrors()) {
            $errorMessages = [];

            foreach ($this->validator->getProcessedErrors()['errors'] as $error) {
                foreach ($error as $message) {
                    $errorMessages[] = $message;
                }
            }

            Session::set('errorMessages', $errorMessages);

            return false;
        }

        return true;
    }
}