<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\View\Components;

use GrigoryGerasimov\Weather\Objects\GPS\Search;
use Illuminate\View\{Component, View};

class SearchComponent extends Component
{
    /**
     * @param Search $weatherSearch
     */
    public function __construct(
        public Search $weatherSearch
    ) {}

    /**
     * @return bool
     */
    public function shouldRender(): bool
    {
        return !is_null($this->weatherSearch);
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('components.search');
    }
}