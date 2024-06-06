<?php

declare(strict_types=1);

namespace App\Request;

use App\Model\Sport;

class StoreTeamRequest
{
    public function __construct(
        public string $name,
        public int $sportId,
        public ?string $city = null,
        public ?\DateTimeImmutable $foundationDate = null,
    ) {
    }
}