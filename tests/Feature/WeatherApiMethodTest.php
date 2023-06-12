<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Tests\Feature;

use GrigoryGerasimov\Weather\Exceptions\ReceivedApiErrorCodeException;
use GrigoryGerasimov\Weather\Facades\Weather;
use GrigoryGerasimov\Weather\Objects\Forecast\Forecast;
use GrigoryGerasimov\Weather\Objects\GPS\Search;
use GrigoryGerasimov\Weather\Objects\Marine\Marine;
use GrigoryGerasimov\Weather\Objects\Marine\MarineHour;
use GrigoryGerasimov\Weather\Objects\Marine\MarineTide;
use GrigoryGerasimov\Weather\Tests\TestCase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithExceptionHandling;
use Illuminate\Support\Collection;

class WeatherApiMethodTest extends TestCase
{
    use InteractsWithExceptionHandling;

    public function test_receiving_current_weather_data(): void
    {
        $this->withoutExceptionHandling();

        $weather = Weather::apiType()->apiKey()->city('Warsaw')->get();

        $this->assertNotNull($weather->current()->getActualCelsius());
        $this->assertIsFloat($weather->current()->getActualCelsius());

        $this->assertNotNull($weather->current()->getFeelsLikeFahrenheit());
        $this->assertIsFloat($weather->current()->getFeelsLikeFahrenheit());

        $this->assertNotNull($weather->current()->getDayNightConditionIcon());
        $this->assertIsInt($weather->current()->getDayNightConditionIcon());
    }

    public function test_receiving_null_insteadof_invalid_current_weather_data(): void
    {
        $weather = Weather::apiType('marine')->apiKey()->city('Warsaw')->get();

        $this->assertNull($weather->current());
    }

    public function test_receiving_forecast_weather_data(): void
    {
        $this->withoutExceptionHandling();

        $weather = Weather::apiType('forecast')->apiKey()->city('Saratov')->forecastDays(2)->get();

        $forecast = $weather->forecast();

        $this->assertNotNull($forecast);
        $this->assertInstanceOf(Collection::class, $forecast);
        $this->assertContainsOnlyInstancesOf(Forecast::class, $forecast);

        $forecastAstro = $forecast->last()->astro();

        $this->assertNotNull($forecastAstro);
        $this->assertIsString($forecastAstro->getCommonAstronomyParams()->getSunriseTime());
        $this->assertIsString($forecastAstro->getCommonAstronomyParams()->getSunsetTime());
        $this->assertIsString($forecastAstro->getCommonAstronomyParams()->getMoonriseTime());
        $this->assertIsString($forecastAstro->getCommonAstronomyParams()->getMoonsetTime());
        $this->assertIsString($forecastAstro->getCommonAstronomyParams()->getMoonIllumination());
        $this->assertIsInt($forecastAstro->getCommonAstronomyParams()->isMoonUp());
        $this->assertIsInt($forecastAstro->getCommonAstronomyParams()->isSunUp());
    }

    public function test_receiving_null_insteadof_invalid_forecast_weather_data(): void
    {
        $weather = Weather::apiType('sports')->apiKey()->ip('137.1.255.255')->get();

        $this->assertNull($weather->forecast());
    }

    public function test_receiving_search_weather_data(): void
    {
        $this->withoutExceptionHandling();

        $weather = Weather::apiType('search')->apiKey()->city('Tallinn')->get();

        $search = $weather->search();

        $this->assertNotNull($search);
        $this->assertInstanceOf(Collection::class, $search);
        $this->assertContainsOnlyInstancesOf(Search::class, $search);

        $this->assertIsString($search->first()->getCity());
        $this->assertIsString($search->first()->getRegion());
        $this->assertIsString($search->first()->getCountry());
        $this->assertIsFloat($search->first()->getLatitude());
        $this->assertIsFloat($search->first()->getLongitude());
        $this->assertIsInt($search->first()->getId());
        $this->assertIsString($search->first()->getUrl());
    }

    public function test_receiving_null_insteadof_invalid_search_weather_data(): void
    {
        $weather = Weather::apiType('sports')->apiKey()->city('Tallinn')->get();

        $this->assertNull($weather->search());
    }

    /*
     * The default Free plan API key is limited to get history data.
     */
    public function test_getting_a_received_api_error_code_exception_instead_of_invalid_history_weather_data(): void
    {
        $this->expectException(ReceivedApiErrorCodeException::class);

        $weather = Weather::apiType('history')->apiKey()->city('Riga')->forecastHistoryDate('2011-02-11')->get();

        $weather->forecast();
    }

    public function test_receiving_marine_weather_data(): void
    {
        $this->withoutExceptionHandling();

        $weather = Weather::apiType('marine')->apiKey()->city('Dover')->forecastDays(3)->get();

        $forecastMarine = $weather->marine();

        $this->assertNotNull($forecastMarine);
        $this->assertInstanceOf(Collection::class, $forecastMarine);
        $this->assertContainsOnlyInstancesOf(Marine::class, $forecastMarine);

        $forecastMarineHour = $forecastMarine->last()->hour();

        $this->assertNotNull($forecastMarineHour);
        $this->assertContainsOnlyInstancesOf(MarineHour::class, $forecastMarineHour);
        $this->assertIsInt($forecastMarineHour->first()->getCommonForecastHourParams()->getTimestamp());
        $this->assertIsString($forecastMarineHour->first()->getCommonForecastHourParams()->getDateTime());
        $this->assertIsFloat($forecastMarineHour->first()->getCommonForecastHourParams()->getActualCelsius());
        $this->assertIsFloat($forecastMarineHour->first()->getCommonForecastHourParams()->getActualFahrenheit());
        $this->assertIsString($forecastMarineHour->last()->getCommonForecastHourParams()->getWeatherCondition()->getText());
        $this->assertIsFloat($forecastMarineHour->get(12)->getCommonForecastHourParams()->getWindSpeedInMiles());
        $this->assertIsString($forecastMarineHour->get(13)->getCommonForecastHourParams()->getWindDirectionInPoints());
        $this->assertIsInt($forecastMarineHour->get(17)->getCommonForecastHourParams()->getCloudCover());
        $this->assertIsFloat($forecastMarineHour->get(6)->getCommonForecastHourParams()->getWindchillInCelsius());
        $this->assertIsFloat($forecastMarineHour->get(8)->getCommonForecastHourParams()->getHeatIndexInCelsius());
        $this->assertNull($forecastMarineHour->get(21)->getCommonForecastHourParams()->shallItRain());
        $this->assertNull($forecastMarineHour->last()->getCommonForecastHourParams()->shallItSnow());
        $this->assertIsFloat($forecastMarineHour->get(10)->getSignificantWaveHeight());
        $this->assertIsFloat($forecastMarineHour->get(11)->getSwellWaveHeightInMetres());
        $this->assertIsFloat($forecastMarineHour->last()->getSwellPeriod());
        $this->assertIsFloat($forecastMarineHour->last()->getWaterTemperatureInFahrenheit());
        $this->assertNull($forecastMarineHour->last()->getCommonForecastHourParams()->getAirQuality());

        $forecastMarineTides = $forecastMarine->first()->tides();
        $this->assertNotNull($forecastMarineTides);
        $this->assertContainsOnlyInstancesOf(MarineTide::class, $forecastMarineTides);
        $this->assertIsString($forecastMarineTides->first()->getLocalTideTime());
        $this->assertIsString($forecastMarineTides->first()->getTideHeight());
        $this->assertIsString($forecastMarineTides->last()->getTideType());
    }

    public function test_receiving_null_insteadof_invalid_marine_weather_data(): void
    {
        $weather = Weather::apiType('marine')->apiKey()->city('Dover')->forecastHistoryDate('2012-02-12')->get();

        $this->assertEmpty($weather->marine());
    }
}
