<?php

declare(strict_types=1);

namespace App\Store\Domain\ValueObject;

class Text
{
    private string $text;

    public static function create(string $text): self
    {
        if (empty($text)) {
            throw new ValidationException
        }

        $self = new static();
        $self->text = $text;

        return $self;
    }

    public function toString(): string
    {
        return $this->text;
    }
}
