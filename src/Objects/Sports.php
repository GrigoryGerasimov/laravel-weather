<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Objects;

use GrigoryGerasimov\Weather\Contracts\WeatherObjectInterface;

final readonly class Sports implements WeatherObjectInterface
{
    /**
     * @param \stdClass $sports
     */
    public function __construct(
        private \stdClass $sports
    ) {}

    /**
     * @return string|null
     */
    public function getStadium(): ?string
    {
        return $this->sports->stadium ?? null;
    }

    /**
     * @return int|string|null
     */
    public function getCountry(): int|string|null
    {
        return $this->sports->country ?? null;
    }

    /**
     * @return string|null
     */
    public function getRegion(): ?string
    {
        return $this->sports->region ?? null;
    }

    /**
     * @return string|null
     */
    public function getTournament(): ?string
    {
        return $this->sports->tournament ?? null;
    }

    /**
     * @return string|null
     */
    public function getStartDateTime(): ?string
    {
        return $this->sports->start ?? null;
    }

    /**
     * @return string|null
     */
    public function getMatch(): ?string
    {
        return $this->sports->match ?? null;
    }
}
