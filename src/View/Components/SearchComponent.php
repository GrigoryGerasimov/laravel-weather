<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\View\Components;

use GrigoryGerasimov\Weather\Objects\GPS\Search;
use Illuminate\View\{Component, View};

class SearchComponent extends Component
{
    public function __construct(
        public Search $weatherSearch
    ) {}

    public function render(): View
    {
        return view('components.search');
    }
}