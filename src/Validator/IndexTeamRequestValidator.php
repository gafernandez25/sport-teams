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
        $this->validate($request, self::RULES);

        return new IndexTeamRequest(
            name: $request->request->get('name'),
            city: $request->request->get('city'),
            sportId: $request->request->get('sport'),
            foundationDate: $request->request->get('foundation_date') ?
                new \DateTimeImmutable($request->request->get('foundation_date')) :
                null,
        );
    }
}