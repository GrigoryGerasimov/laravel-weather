<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\View\Components;

use GrigoryGerasimov\Weather\Objects\Astronomy;
use Illuminate\View\{Component, View};

class AstronomyComponent extends Component
{
    /**
     * @param Astronomy $weatherAstro
     */
    public function __construct(
        public Astronomy $weatherAstro
    ) {}

    /**
     * @return bool
     */
    public function shouldRender(): bool
    {
        return !is_null($this->weatherAstro);
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('components.astronomy');
    }
}