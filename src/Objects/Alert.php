<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Objects;

use GrigoryGerasimov\Weather\Contracts\WeatherObjectInterface;

final readonly class Alert implements WeatherObjectInterface
{
    public function __construct(
        private \stdClass $alert
    ) {}

    public function getHeadline(): ?string
    {
        return $this->alert->headline ?? null;
    }
    public function getAlertType(): ?string
    {
        return $this->alert->msgType ?? null;
    }
    public function getSeverity(): ?string
    {
        return $this->alert->severity ?? null;
    }
    public function getUrgency(): ?string
    {
        return $this->alert->urgency ?? null;
    }
    public function getAreas(): ?string
    {
        return $this->alert->areas ?? null;
    }
    public function getCategory(): ?string
    {
        return $this->alert->category ?? null;
    }
    public function getCertainty(): ?string
    {
        return $this->alert->certainty ?? null;
    }
    public function getEvent(): ?string
    {
        return $this->alert->event ?? null;
    }
    public function getNote(): ?string
    {
        return $this->alert->note ?? null;
    }
    public function getEffective(): mixed
    {
        return $this->alert->effective ?? null;
    }
    public function getExpires(): ?string
    {
        return $this->alert->expires ?? null;
    }

    public function getDescription(): ?string
    {
        return $this->alert->desc ?? null;
    }

    public function getInstruction(): ?string
    {
        return $this->alert->instruction ?? null;
    }
}