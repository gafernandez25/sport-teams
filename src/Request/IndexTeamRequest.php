<?php

declare(strict_types=1);

namespace App\Request;

use App\Model\Sport;

class IndexTeamRequest
{
    public function __construct(
        public ?string $name = null,
        public ?string $city = null,
        public ?int $sportId = null,
        public ?\DateTimeImmutable $foundationDate = null,
    ) {
    }
}