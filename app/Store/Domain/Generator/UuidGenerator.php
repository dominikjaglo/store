<?php

declare(strict_types=1);

namespace App\Store\Domain\Generator;

use App\Store\Domain\ValueObject\Uuid;

interface UuidGenerator
{
    public function generate(): Uuid;

    public function fromString(string $string): Uuid;
}
