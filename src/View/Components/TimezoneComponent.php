<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\View\Components;

use GrigoryGerasimov\Weather\Objects\Timezone;
use Illuminate\View\{Component, View};

class TimezoneComponent extends Component
{
    public function __construct(
        public Timezone $timezone
    ) {}

    public function render(): View
    {
        return view('components.timezone');
    }
}