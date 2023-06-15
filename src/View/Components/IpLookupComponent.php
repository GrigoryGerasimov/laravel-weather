<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\View\Components;

use GrigoryGerasimov\Weather\Objects\GPS\IpLookup;
use Illuminate\View\{Component, View};

class IpLookupComponent extends Component
{
    public function __construct(
        public IpLookup $weatherIpLookup
    ) {}

    public function render(): View
    {
        return view('components.ip');
    }
}