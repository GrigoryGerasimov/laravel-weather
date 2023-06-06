<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Objects;

final readonly class Alert
{
    public function __construct(
        private \stdClass $alert
    ) {}

    public function getHeadline(): ?string
    {
        return $this->alert->headline;
    }
    public function getAlertType(): ?string
    {
        return $this->alert->msgType;
    }
    public function getSeverity(): string
    {
        return $this->alert->severity;
    }
    public function getUrgency(): ?string
    {
        return $this->alert->urgency;
    }
    public function getAreas(): ?string
    {
        return $this->alert->areas;
    }
    public function getCategory(): ?string
    {
        return $this->alert->category;
    }
    public function getCertainty(): ?string
    {
        return $this->alert->certainty;
    }
    public function getEvent(): ?string
    {
        return $this->alert->event;
    }
    public function getNote(): ?string
    {
        return $this->alert->note;
    }
    public function getEffective(): mixed
    {
        return $this->alert->effective;
    }
    public function getExpires(): ?string
    {
        return $this->alert->expires;
    }

    public function getDescription(): ?string
    {
        return $this->alert->desc;
    }

    public function getInstruction(): ?string
    {
        return $this->alert->instruction;
    }
}