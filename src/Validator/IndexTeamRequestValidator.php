<?php

declare(strict_types=1);

namespace App\Validator;

use App\Request\IndexTeamRequest;
use Symfony\Component\HttpFoundation\Request;

class IndexTeamRequestValidator extends AbstractValidator
{
    private const RULES = [
        'name' => 'required',
        'sport' => 'required|is:int',
        'foundation_date' => 'date',
    ];

    public function validateRequest(Request $request): IndexTeamRequest
    {
        $this->validate($request->getPayload()->all(), self::RULES);

        return new IndexTeamRequest(
            name: $request->getPayload()->get('name'),
            sportId: $request->getPayload()->get('sport'),
            city: $request->getPayload()->get('city'),
            foundationDate: $request->getPayload()->has('foundation_date') ?
                new \DateTimeImmutable($request->getPayload()->get('foundation_date')) :
                null,
        );
    }
}