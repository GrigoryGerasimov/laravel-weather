<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\View\Components;

use Illuminate\View\{Component, View};
use Illuminate\Support\Collection;

class MarineComponent extends Component
{
    public function __construct(
        public Collection $weatherMarine
    ) {}

    public function render(): View
    {
        return view('components.marine');
    }
}