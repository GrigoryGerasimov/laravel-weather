<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Objects;

use GrigoryGerasimov\Weather\Contracts\WeatherObjectInterface;

final readonly class Condition implements WeatherObjectInterface
{
    /**
     * @param \stdClass $condition
     */
    public function __construct(
        private \stdClass $condition
    ) {}

    /**
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->condition->text ?? null;
    }

    /**
     * @return string|null
     */
    public function getIconUrl(): ?string
    {
        return $this->condition->icon ?? null;
    }

    /**
     * @return int|null
     */
    public function getCode(): ?int
    {
        return $this->condition->code ?? null;
    }
}