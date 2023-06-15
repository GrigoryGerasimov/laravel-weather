<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\View\Components;

use GrigoryGerasimov\Weather\Objects\Sports;
use Illuminate\View\{Component, View};

class SportsComponent extends Component
{
    /**
     * @param Sports $weatherSports
     */
    public function __construct(
        public Sports $weatherSports
    ) {}

    /**
     * @return bool
     */
    public function shouldRender(): bool
    {
        return !is_null($this->weatherSports);
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('components.sports');
    }
}