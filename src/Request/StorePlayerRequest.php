<?php

declare(strict_types=1);

namespace App\Request;

readonly class StorePlayerRequest
{
    public function __construct(
        public string $firstName,
        public string $lastName,
        public int $number,
        public bool $isCaptain = false,
        public ?\DateTimeImmutable $birthDate = null,
    ) {
    }
}