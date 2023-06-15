<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\View\Components;

use GrigoryGerasimov\Weather\Objects\Astronomy;
use Illuminate\View\{Component, View};

class AstronomyComponent extends Component
{
    public function __construct(
        public Astronomy $astronomy
    ) {}

    public function render(): View
    {
        return view('components.astronomy');
    }
}