<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Contracts\WeatherCollection;

interface WeatherCollectionInterface
{
    public function common();

    public function day();

    public function astro();

    public function hour();
}
