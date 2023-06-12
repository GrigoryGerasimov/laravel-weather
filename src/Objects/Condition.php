<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Objects;

use GrigoryGerasimov\Weather\Contracts\WeatherObjectInterface;

final readonly class Condition implements WeatherObjectInterface
{
    public function __construct(
        private \stdClass $condition
    ) {}

    public function getText(): ?string
    {
        return $this->condition->text ?? null;
    }

    public function getIconUrl(): ?string
    {
        return $this->condition->icon ?? null;
    }

    public function getCode(): ?int
    {
        return $this->condition->code ?? null;
    }
}