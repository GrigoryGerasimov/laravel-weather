<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\View\Components;

use Illuminate\View\{Component, View};
use GrigoryGerasimov\Weather\Objects\Condition;

class ConditionComponent extends Component
{
    /**
     * @param Condition $weatherCondition
     */
    public function __construct(
        public Condition $weatherCondition
    ) {}

    /**
     * @return bool
     */
    public function shouldRender(): bool
    {
        return !is_null($this->weatherCondition);
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('vendor.laravel-weather.components.condition');
    }
}
