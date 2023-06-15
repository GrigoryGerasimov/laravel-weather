<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\View\Components;

use GrigoryGerasimov\Weather\Objects\Current;
use Illuminate\View\{Component, View};

class CurrentComponent extends Component
{
    public function __construct(
        public Current $weatherCurrent
    ) {}

    public function render(): View
    {
        return view('components.current');
    }
}