<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Objects;

use GrigoryGerasimov\Weather\Contracts\WeatherObjectInterface;

final readonly class Alert implements WeatherObjectInterface
{
    /**
     * @param \stdClass $alert
     */
    public function __construct(
        private \stdClass $alert
    ) {}

    /**
     * @return string|null
     */
    public function getHeadline(): ?string
    {
        return $this->alert->headline ?? null;
    }

    /**
     * @return string|null
     */
    public function getAlertType(): ?string
    {
        return $this->alert->msgType ?? null;
    }

    /**
     * @return string|null
     */
    public function getSeverity(): ?string
    {
        return $this->alert->severity ?? null;
    }

    /**
     * @return string|null
     */
    public function getUrgency(): ?string
    {
        return $this->alert->urgency ?? null;
    }

    /**
     * @return string|null
     */
    public function getAreas(): ?string
    {
        return $this->alert->areas ?? null;
    }

    /**
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->alert->category ?? null;
    }

    /**
     * @return string|null
     */
    public function getCertainty(): ?string
    {
        return $this->alert->certainty ?? null;
    }

    /**
     * @return string|null
     */
    public function getEvent(): ?string
    {
        return $this->alert->event ?? null;
    }

    /**
     * @return string|null
     */
    public function getNote(): ?string
    {
        return $this->alert->note ?? null;
    }

    /**
     * @return mixed
     */
    public function getEffective(): mixed
    {
        return $this->alert->effective ?? null;
    }

    /**
     * @return string|null
     */
    public function getExpires(): ?string
    {
        return $this->alert->expires ?? null;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->alert->desc ?? null;
    }

    /**
     * @return string|null
     */
    public function getInstruction(): ?string
    {
        return $this->alert->instruction ?? null;
    }
}