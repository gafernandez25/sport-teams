<?php

declare(strict_types=1);

namespace App\Validator;

use App\Request\StoreTeamRequest;
use Symfony\Component\HttpFoundation\Request;

class StoreTeamRequestValidator extends AbstractValidator
{
    private const RULES = [
        'name' => 'required',
        'sport' => 'required|is:int',
        'foundation_date' => 'date',
    ];

    public function validateRequest(Request $request): StoreTeamRequest
    {
        $this->validate($request->getPayload()->all(), self::RULES);

        return new StoreTeamRequest(
            name: $request->getPayload()->get('name'),
            sportId: $request->getPayload()->get('sport'),
            city: $request->getPayload()->get('city'),
            foundationDate: $request->getPayload()->has('foundation_date') ?
                new \DateTimeImmutable($request->getPayload()->get('foundation_date')) :
                null,
        );
    }
}