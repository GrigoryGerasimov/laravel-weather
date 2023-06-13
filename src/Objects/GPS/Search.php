<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Objects\GPS;

final readonly class Search extends Gps
{
    /**
     * @param \stdClass $search
     */
    public function __construct(
        private \stdClass $search
    ) {
        parent::__construct($search);
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->search->id ?? null;
    }

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->search->url ?? null;
    }
}
