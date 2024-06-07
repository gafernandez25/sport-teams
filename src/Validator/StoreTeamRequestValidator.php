<?php

declare(strict_types=1);

namespace App\Validator;

use App\Request\StoreTeamRequest;
use App\Response\ValidationErrorResponse;
use Core\Session;
use Symfony\Component\HttpFoundation\Request;

class StoreTeamRequestValidator extends AbstractValidator
{
    private const RULES = [
        'name' => 'required',
        'sport' => 'required|is:numeric',
        'foundation_date' => 'date:d-m-Y',
    ];

    public function validateRequest(Request $request): StoreTeamRequest
    {
        if (!$this->validate($request->getPayload()->all(), self::RULES)) {
            Session::set('oldInput', $request->getPayload()->all());

            ValidationErrorResponse::redirectBack();
        }

        return new StoreTeamRequest(
            name: $request->getPayload()->get('name'),
            sportId: (int)$request->getPayload()->get('sport'),
            city: $request->getPayload()->get('city'),
            foundationDate: !empty($request->getPayload()->get('foundation_date')) ?
                \DateTimeImmutable::createFromFormat('d-m-Y', $request->getPayload()->get('foundation_date')) :
                null,
        );
    }
}