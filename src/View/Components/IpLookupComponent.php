<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\View\Components;

use GrigoryGerasimov\Weather\Objects\GPS\IpLookup;
use Illuminate\View\{Component, View};

class IpLookupComponent extends Component
{
    /**
     * @param IpLookup $weatherIpLookup
     */
    public function __construct(
        public IpLookup $weatherIpLookup
    ) {}

    /**
     * @return bool
     */
    public function shouldRender(): bool
    {
        return !is_null($this->weatherIpLookup);
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('components.ip');
    }
}