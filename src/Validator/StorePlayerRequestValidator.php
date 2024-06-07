<?php

declare(strict_types=1);

namespace App\Validator;

use App\Request\StorePlayerRequest;
use App\Response\ValidationErrorResponse;
use Core\Session;
use Symfony\Component\HttpFoundation\Request;

class StorePlayerRequestValidator extends AbstractValidator
{
    private const RULES = [
        'first_name' => 'required',
        'last_name' => 'required',
        'number' => 'required|is:numeric|max:99',
        'birth_date' => 'date:d-m-Y',
    ];

    public function validateRequest(Request $request): StorePlayerRequest
    {
        if (!$this->validate($request->getPayload()->all(), self::RULES)) {
            Session::set('oldInput', $request->getPayload()->all());

            ValidationErrorResponse::redirectBack();
        }

        return new StorePlayerRequest(
            firstName: $request->getPayload()->get('first_name'),
            lastName: $request->getPayload()->get('last_name'),
            number: (int)$request->getPayload()->get('number'),
            isCaptain: $request->getPayload()->has('is_captain'),
            birthDate: !empty($request->getPayload()->get('birth_date')) ?
                \DateTimeImmutable::createFromFormat('d-m-Y', $request->getPayload()->get('birth_date')) :
                null,
        );
    }
}