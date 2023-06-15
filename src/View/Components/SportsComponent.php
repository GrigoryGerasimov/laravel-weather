<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\View\Components;

use GrigoryGerasimov\Weather\Objects\Sports;
use Illuminate\View\{Component, View};

class SportsComponent extends Component
{
    public function __construct(
        public Sports $sports
    ) {}

    public function render(): View
    {
        return view('components.sports');
    }
}