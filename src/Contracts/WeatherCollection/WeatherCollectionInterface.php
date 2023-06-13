<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Contracts\WeatherCollection;

use GrigoryGerasimov\Weather\Objects\Forecast\ForecastAstro;
use GrigoryGerasimov\Weather\Objects\Forecast\ForecastCommon;
use GrigoryGerasimov\Weather\Objects\Forecast\ForecastDay;
use Illuminate\Support\Collection;

interface WeatherCollectionInterface
{
    /**
     * @return ForecastCommon|null
     */
    public function common(): ?ForecastCommon;

    /**
     * @return ForecastDay|null
     */
    public function day(): ?ForecastDay;

    /**
     * @return ForecastAstro|null
     */
    public function astro(): ?ForecastAstro;

    /**
     * @return Collection|null
     */
    public function hour(): ?Collection;
}
